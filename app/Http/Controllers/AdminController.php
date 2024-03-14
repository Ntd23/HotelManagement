<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Contact;
use App\Models\Gallary;
use App\Models\Room;
use App\Notifications\SendEmailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Notification;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
            if ($usertype == 'user') {
                $room = Room::all();
                $gallary = Gallary::all();
                return view('home.index', compact('room', 'gallary'));
            } else if ($usertype == 'admin') {
                return view('admin.index');
            } else {
                return redirect()->back();
            }
        }
    }
    public function home()
    {
        $room = Room::all();
        $gallary = Gallary::all();
        return view('home.index', compact('room', 'gallary'));
    }
    public function view_rooms()
    {
        $data = Room::all();
        return view('admin.view_rooms', compact('data'));
    }
    public function create_room()
    {
        return view('admin.create_room');
    }
    public function add_room(Request $request)
    {
        $data = new Room();
        $data->room_title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->room_type = $request->type;
        $data->wifi = $request->wifi;
        $image = $request->image;
        if ($image) {
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('room', $image_name);
            $data->image = $image_name;
        }

        $data->save();

        return redirect()->to('view_rooms');
    }
    public function update_room($id)
    {
        $data = Room::find($id);
        return view('admin.update_room', compact('data'));
    }
    public function edit_room(Request $request, $id)
    {
        $data = Room::find($id);
        $data->room_title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->room_type = $request->type;
        $data->wifi = $request->wifi;
        $image = $request->image;
        if ($image) {
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('room', $image_name);
            $data->image = $image_name;
        }

        $data->save();
        return redirect()->to('view_rooms');
    }
    public function delete_room($id)
    {
        $data = Room::find($id);
        $data->delete();
        return redirect()->to('view_rooms');
    }
    public function bookings()
    {
        $data = Booking::all();
        return view('admin.bookings', compact('data'));
    }
    public function booking_delete($id)
    {
        $data = Booking::find($id);
        $data->delete();
        return redirect()->to('bookings');
    }
    public function booking_approve($id)
    {
        $booking = Booking::find($id);
        $booking->status = 'approved';
        $booking->save();

        return redirect()->back();
    }
    public function booking_reject($id)
    {
        $booking = Booking::find($id);
        $booking->status = 'rejected';
        $booking->save();

        return redirect()->back();
    }
    public function view_gallaries()
    {
        $gallary = Gallary::all();
        return view('admin.view_gallaries', compact('gallary'));
    }
    public function upload_gallary(Request $request)
    {
        $data = new Gallary();
        $image = $request->image;
        if ($image) {
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('gallary', $image_name);
            $data->image = $image_name;
            $data->save();
            return redirect()->to('/view_gallaries');
        }
    }
    public function delete_gallary($id)
    {
        $data = Gallary::find($id);
        $data->delete();
        return redirect()->to('/view_gallaries');
    }
    public function messages() {
        $data= Contact::all();
        return view('admin.messages', compact('data'));
    }
    public function send_mail($id) {
        $data= Contact::find($id);
        return view('admin.send_mail', compact('data'));
    }
    public function mail(Request $request, $id) {
        $data= Contact::find($id);
        $details= [
            'greeting'=> $request->greeting,
            'body'=> $request->body,
            'action_text'=> $request->action_text,
            'action_url'=> $request->action_url,
            'endline'=> $request->endline,
        ];
        Notification::send($data, new SendEmailNotification($details));
        return redirect()->back();
    }
}
