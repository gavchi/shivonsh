<?php

class FeedbackController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        return View::make('pages.feedback');
    }

    public function postIndex()
    {
        $data = Input::all();
        $validator = Validator::make(
            $data,
            array(
                'name' => 'required',
                'email' => 'required|email',
                'subject' => 'required',
                'message' => 'required',
                'captcha' => 'required|captcha'
            )
        );
        if ($validator->fails()){
            $errors = $validator->messages();
            $messages = '';
            foreach ($errors->all() as $error)
            {
                $messages .= $error
                    .'
';
            }
            return View::make('pages.feedback')->with('messages', $messages);
        }else{

            Mail::send('emails.feedback', array(
                'mess' => $data['message'],
                'name' => $data['name'],
                'email' => $data['email'],
            ), function($message) use ($data)
            {
                $message->from(Config::get('mail.from.address'), Config::get('mail.from.name'));
                $message->to('shivonsh@gmail.com')->subject($data['subject']);
            });
            $messages = '<p>Письмо успешно отправлено!</p>';
            return View::make('pages.feedback')->with('messages', $messages);
        }
        return View::make('pages.feedback');
    }
}
