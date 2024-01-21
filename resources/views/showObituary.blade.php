
@extends('layouts.landing.master')

@section('title')
   Profile
@endsection

@section('header')
<style>
p {
    margin-bottom: 5px; /* Adjust the margin-bottom as needed */
}

.custom-border {
    border: 10px solid #007bff; /* Set the border style and color */
    border-color:white;
}
</style>
@endsection
@section('content')

<div class="container">
    <div class="layout-page">
        <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">

      

                <div class="row">
                    
                   <!-- About User -->
                   <div class="col-xl-4 col-lg-5 col-md-5">
 
                            <div class="card-body">

                                <div class="user-avatar-section">
                                    <div class=" d-flex align-items-center flex-column">
                                        <img class="img-fluid my-4 custom-border" src="{{asset($dead->image)}}" height="300" width="300" alt="User avatar">
                                    </div>
                                </div>

                             <div class="col-xs-12 text-center share-memory-btns ">

                                   <p>Contact Us</p>


                                <a type="button" href="https://www.facebook.com/YourPageName" class="btn btn-icon btn-facebook" target="_blank">
                                    <i class="tf-icons bx bxl-facebook"></i>
                                </a>

                                <a type="button" href="https://www.facebook.com/YourPageName" class="btn btn-icon btn-twitter" target="_blank">
                                    <i class="tf-icons bx bxl-twitter"></i>
                                </a>      

                                <a type="button" href="https://www.facebook.com/YourPageName" class="btn btn-icon btn-instagram" target="_blank">
                                    <i class="tf-icons bx bxl-instagram"></i>
                                </a>

                                <a type="button" href="https://www.facebook.com/YourPageName" class="btn btn-icon btn-github" target="_blank">
                                    <i class="tf-icons bx bxl-github"></i>
                                </a>   
                            </div>

                            </div>
                       
                    </div>
                    <!--/ About User -->


                    <div class="col-xl-8 col-lg-7 col-md-7">

                        <div class="obittitleV31">
                            <div class="obittitleV31-official">
                                Official Obituary of
                            </div>
                            @php
                                $middleName = $dead->mname;
                                $initial = strtoupper(substr($middleName, 0, 1));
                            @endphp
                            <h1><em>{{$dead->fname}} {{$initial}}. {{$dead->lname}}</em></h1>
                            <div class="obitdates">
                                <span class="dod">
                                    @php
                                      $died = \Carbon\Carbon::parse($dead->dateofdeath);
                                      $dateofdeath = $died->format('F d, Y');
                                  @endphp
                                  {{$dateofdeath}}
                                </span>
                            </div>
                                
                    </div>

                        <!-- Orders table -->
                        <div class="card mb-4 mt-4">
                            <h3 class="card-header">{{$dead->fname}} {{$dead->lname}}</h3>
                            
                            <div class="card-body">
                                <p class="lead mb-0">
                                    <?php
                                        // Assuming $description is the text retrieved from the database
                                        $paragraphs = explode("\n", $dead->description);

                                        foreach ($paragraphs as $paragraph) {
                                            echo '<p>' . nl2br($paragraph) . '</p>';
                                        }
                                    ?>
                                </p>

                                <hr class="m-10" />
                                <small class="text-muted text-uppercase">Wake Schedule:</small>
                                
                                <dl class="row mt-2">
                                    <dt class="col-sm-2">When:</dt>
                                    <dt class="col-sm-2"><small class="text-light fw-medium">From</small></dt>
                                    <dd class="col-sm-8">
                                        @php
                                            $datetimeString = $dead->order->durationfrom;

                                            // Create a DateTime object from the string
                                            $dateTime = new DateTime($datetimeString);

                                            // Format the DateTime object as desired
                                            $formattedDateTime = $dateTime->format('l, F j, Y, g:i A');
                                        @endphp

                                        {{$formattedDateTime}}
                                    </dd>
                                    <dt class="col-sm-2"></dt>
                                    <dt class="col-sm-2"><small class="text-light fw-medium">To:</small></dt>
                                    <dd class="col-sm-8">
                                        @php
                                            $datetimeString1 = $dead->order->durationto;

                                            // Create a DateTime object from the string
                                            $dateTime1 = new DateTime($datetimeString1);

                                            // Format the DateTime object as desired
                                            $formattedDateTime1 = $dateTime1->format('l, F j, Y, g:i A');
                                        @endphp
                                        {{$formattedDateTime1}}
                                    </dd>
                                </dl>

                                <dl class="row mt-2">
                                    <dt class="col-sm-2">Where:</dt>
                                    <dt class="col-sm-2"><small class="text-light fw-medium">Location:</small></dt>
                                    <dd class="col-sm-8">
                                        PIKES address
                                    </dd>
                                </dl>

                            </div>
                        </div>
                        <!-- /Orders table -->
                    
                
                    
                    </div>

                </div>

            </div>

        </div>
    </div>


</div>


@endsection


@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@endsection