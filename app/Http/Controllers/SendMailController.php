<?php

namespace App\Http\Controllers;
use Mail;
use Illuminate\Http\Request;

class SendMailController extends Controller
{
    public function index(){
        return view('adminsendlink',compact('participant'));
    }
    public function send(Request $request){
        try{
            Mail::send('formlinkwebinar', array('formatlink' => $request->formatlink) , function($formatlink) use($request){
                $formatlink->to($request->email,'Link Join Webinar')->subject('Link Join Webinar');
                $formatlink->from(env('MAIL_USERNAME','aplikasiwebinar@gmail.com'),'Silakan Join Link Webinar');
            });
        return redirect('/admindashboard');
        }catch (Exception $e){
            return response (['status' => false,'errors' => $e->getMessage()]);
        }
    }

    public function index1(){
        return view('adminsendcertificate',compact('participant'));
    }
    public function send1(Request $request){
        try{
            Mail::send('formcertificatewebinar', array('formatlink' => $request->formatlink) , function($formatlink) use($request){
                $formatlink->to($request->email,'e-Certificate Webinar')->subject('e-Certificate Webinar');
                $formatlink->from(env('MAIL_USERNAME','aplikasiwebinar@gmail.com'),'e-Certificate Webinar');
            });
        return redirect('/admindashboard');
        }catch (Exception $e){
            return response (['status' => false,'errors' => $e->getMessage()]);
        }
    }
    public function sendtoAll(Request $request) {
        try {
            $allEmail = json_decode($request->allEmail);
            $link = $request->formatlink;
            foreach ($allEmail as $email) {
                Mail::send('formlinkwebinar', array('formatlink' => $link) , function($formatlink) use($email){
                    $formatlink->to($email->email,'Link Join Webinar')->subject('Link Join Webinar');
                    $formatlink->from(env('MAIL_USERNAME','aplikasiwebinar@gmail.com'),'Silakan Join Link Webinar');
                });
            }
            return redirect('/admindashboard');
        } catch (\Exception $e) {
            return response(['status' => false, 'errors' => $e->getMessage()]);
        }
    }
    public function sendByWebinar(Request $request) {
        try {

        } catch (\Exception $e) {
            return response(['status' => false, 'errors' => $e->getMessage()]);
        }
    }
}
