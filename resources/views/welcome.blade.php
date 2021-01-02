<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>FEMA</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:#ffffff;background-color:#ffffff;background-color:#e7f1e1}.border-gray-200{--border-opacity:1;border-color:#ffffff;border-color:#ffffff}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#ffffff;color:#ffffff}.text-gray-500{--text-opacity:1;color:#ffffff;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--}
            ::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
  color: #07ca02;
  font-weight: bolder;
  opacity: 1; /* Firefox */
}

:-ms-input-placeholder { /* Internet Explorer 10-11 */
  color: #07ca02;
  font-weight: bolder;
}

::-ms-input-placeholder { /* Microsoft Edge */
  color: #07ca02;
  font-weight: bolder;
}
        </style>

        <style>
            body {
                font-family: 'Nunito';
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
       ---+++++++++++++++             @endauth
                </div>
            @endif

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                    <img src="{{ URL::to('img/image.png') }}" style="width:50vw">
                </div>

                <div class="overflow-hidden shadow lg:rounded-lg" style="width:60vw; height:auto; padding: 50px;  margin-top: 20px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); background-image:url('{{ asset('img/ipdp.jpg') }}'); ">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                                @error('email')
                                    <span class="invalid-feedback" role="alert" style="color:red; display: flex; justify-content: center; align-items: center; size: 18;">
                                        <i class="fa fa-exclamation-circle fa-lg"></i>
                                    </span>
                                @enderror
                        <div style="display:flex; flex-direction: row; justify-content: center; align-items: center">
                            <span> <i class="fa fa-user-circle-o fa-lg fa-bold" style="color: #f8EFCE; font-weight: bolder;"></i>&emsp;&emsp; </span>

                            <div class="col-md-6">
                                <input id="email" type="email" autocomplete="off" placeholder="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus style="background-color: transparent;  color: #ffffff; width: 40vw; height: 30px; font-weight: bolder;">

                            </div>
                        </div>

                        <div class="form-group row" style="display:flex; flex-direction: row; justify-content: center; align-items: center">
                            <span> <i class="fa fa-key fa-lg fa-bold" style="color:transparent;"> &emsp;</i> </span>

                            <div class="col-md-6">
                                <input id="password" type="password" placeholder="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" style="background-color:transparent; color: #ffffff; width: 40vw; height: 30px; font-weight: bolder;">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row" style="display:flex; flex-direction: row; justify-content: center; align-items: center">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember" style="color: #585858">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0" style="display:flex; flex-direction: row; justify-content: center; align-items: center">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="	padding:10px; font-weight:bolder; color:#07ca02;">
                                    {{ __('Login') }}
                                </button>

                            </div>
                        </div>
                </div>

                <div class="flex justify-center mt-4 sm:items-center sm:justify-between" style=" position: fixed;left: 0;bottom: 0;width:100%;background-color: #50c878;color: white;text-align: center; padding:15px;">
                    <div class="text-center text-sm text-gray-500 sm:text-left">
                        <div class="flex items-center">
                           
                           <span style="color: #0d9d0a"> <i class="fa fa-home"></i> </span> 

                            <a href="https://fema.abj.gov.ng/contacts-us/" class="ml-1 underline" style="color:#ffffff">
                                Yakubu Gowon Cres, Asokoro, Abuja
                            </a>
                        </div>
                            
							<span style="color: #0d9d0a"> <i class="fa fa-envelope"></i> </span>
                            <a href="https://fema.abj.gov.ng/contacts-us/" class="ml-1 underline" style="color: #ffffff;">
                                info@fema.abj.gov.ng
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </body>
</html>
