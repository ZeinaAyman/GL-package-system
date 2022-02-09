@extends('layouts.app')
  
@section('content')
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" type="text/css" href="css/mainResults.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style>


</style>
    <script>
     $(document).ready(function() {
          (function($) {
              $("tbody").addClass("search");
              $('#myInput').keyup(function() {
                 var rex = new RegExp($(this).val(), 'i');
                        // var $t = $(this).children(":eq(4))");
                  $('.search tr ').hide();

                        //Recusively filter the jquery object to get results.
                  $('.search tr ').filter(function(i, v) {
                          //Get the 3rd column object here which is userNamecolumn
                      var $t = $(this);
                      return rex.test($t.text());
                      }).show();
                  })

          }(jQuery));
      });
        </script>
        <div class="input-field first-wrap">
                    <div class="svg-wrapper">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path
                                d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z">
                            </path>
                        </svg>
                    </div>
                    <input id="myInput" type="text"  placeholder="Search" required />
                </div>
<div class="limiter" style="position: absolute;">
{{ csrf_field() }}

		<div class="container grid px-6 ">
			<div class="w-full overflow-x-auto">
				<div class="table100">
                @if($package->isNotEmpty())
					<table>
                    <input type="hidden" name="_token" value="ssdfdsfsdfsdfs32r23442">
						<thead>
							<tr class="text-l font-semibold  text-gray-200 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="column1">ID</th>
                            <th class="column1">Member Name</th>
                            <th class="column1">Member ID</th>
                            <th class="column1">Member Email</th>
                            <th class="column1">Member Phone</th>
                            <th class="column1">Package Items</th>
                            <th class="column1">Amount</th>
                            <th class="column1">Paid</th>
                            <th class="column1">Paid By</th>
                            <th class="column1">Time of Payment</th>
							</tr>
						</thead>
						<tbody>
							
                        @foreach ($package as $package)
    <tr class="text-gray-700 dark:text-gray-600">
                     <td class="column2 font-semibold">{{ $package->id }}</td>
                     <td class="column2 font-semibold">{{ $package->member_name }}</td>
                     <td class="column2 font-semibold">{{ $package->member_id }}</td>
                     <td class="column2 font-semibold">{{ $package->email }}</td>
                     <td class="column2 font-semibold">{{ $package->phone }}</td>
                     <td class="column3 font-semibold">
                        @if($package->tshirt)
                        - Tshirt ({{$package->tshirt_length}} {{$package->tshirt_size}}) <br>
                        @endif
                        @if($package->hoodie)
                        - Hoodie ({{$package->hoodie_size}})<br>
                        @endif
                        @if($package->nametag)
                        - Nametag ({{$package->nametag_name}})<br>
                        @endif
                        @if($package->bracelet)
                        - Bracelet<br>
                        @endif
                        @if($package->pin)
                        - Pin<br>
                        @endif

                         </td>
                     <!-- <td class="column1"><i class="{{$package->tshirt ? 'fa fa-check' : 'fa fa-close' }}" style="{{$package->tshirt ? 'color: green;' : 'color: red;' }}"></i></td>
                     <td class="column1"><i class="{{$package->nametag ? 'fa fa-check' : 'fa fa-close' }}" style="{{$package->nametag ? 'color: green;' : 'color: red;' }}"></i></td>
                     <td class="column1"><i class="{{$package->bracelet ? 'fa fa-check' : 'fa fa-close' }}" style="{{$package->bracelet ? 'color: green;' : 'color: red;' }}"></i></td> -->
                     <td class="column2 font-semibold">{{ $package->amount }}</td>
                        @if(str_replace(url('/'), '', url()->current()) == '/viewall')
                        <td class="column2 font-semibold"><i class="{{$package->paid ? 'fa fa-check' : 'fa fa-close' }}" style="{{$package->paid ? 'color: green;' : 'color: red;' }}"></i></td>

                        @else
                        <td class="column2 font-semibold"><a href="{{ url('changePayment/'.$package->serial_number . '/'.$package->paid) }}"><button type="button" class="toggle_class" data-id="{{$package->serial_number}}" data-paid="{{$package->paid}}" ><i class="{{$package->paid ? 'fa fa-check' : 'fa fa-close' }}" style="{{$package->paid ? 'color: green;' : 'color: red;' }}"></i></button></a></td>

                        @endif
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    @if(!$package->paid_by)
                    <td class="column2 font-semibold">None</td>
                    @else
                    <td class="column2 font-semibold">{{ $package->paid_by }}</td>
                    @endif
                    <td class="column2 font-semibold">
                        @if ($package->verified_at)
                        {{date('d-m-Y h:i A',strtotime($package->verified_at))}}
                        @else
                        Package not verified yet
                        @endif
                    </td>
                    </tr>
        
					</tbody>
                    @endforeach	
    @else 
    <div>
        <h2 style="text-align: center; color: white;">Serial number doesn't Exist</h2>
    </div>
@endif
				</table>
			</div>
		</div>
	</div>
</div>
@endsection