@extends('layouts.client')

@section('content')
    <!-- wrapper -->
    <div class="contact-wrapper">
        <!-- For inquiries -->
        <div>
            <h3 class="">For inquiries</h3>
            <p>
                <span>Call center from 9am to 7pm</span> <br>
                Phone: +1-201-513-0514 <br>
                Mobile: +1-555-555-1234 <br>
                Email: inquiries@skyfurniture.com <br>
            </p>
        </div>
        <!-- For Complains -->
        <div>
            <h3>For Complains</h3>
            <p>
                <span>Call center from 9am to 7pm</span> <br>
                Phone: +1-201-515-2314<br>
                Mobile: +1-555-787-1234<br>
                Email: complains@skyfurniture.com<br>
            </p>
        </div>
        <!-- For opinions  -->
        <div>
            <h3>Opinions</h3>
            <form action="#">
                <div>
                    <label for="subject">Subject</label>
                    <input type="text" placeholder="Enter You Message Subject" name="subject" id="">
                    <label for="message">Message</label>
                    <textarea name="message" placeholder="Enter Your Message" id="" cols="50" rows="10"></textarea>
                    <div class="text-center">
                        <input type="submit" value="Send" class="">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection