@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Attendance summary</div>

                <div class="panel-body">
                    Hi {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Attendance</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(Auth::user()->attendance->count() > 0 )

                                @foreach(Auth::user()->attendance as $User)
                                <tr>
                                    <td>{{ Carbon\Carbon::parse($User->date)->format('d-m-Y') }}</td>
                                    <td>{{ $User->attendance ? "Present" : "Absent" }}</td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="2">Student always attend the class</td>
                                </tr>
                            @endif
                        </tbody>
                        <thead>
                            <tr>
                                <th>Status Attendance</th>
                                {{--@if (Auth::user()->attendance->count() > 0)--}}
                                    {{--<th>{{ Auth::user()->present->count() / Auth::user()->attendance->count() * 100 }}</th>--}}
                                    {{--<th> {{ number_format((Auth::user()->attendance->count())/ 3, 2 )}} %</th>--}}
                                {{--@else--}}
                                    {{--<th>100% attend class</th>--}}
                                {{--@endif--}}
                                @if(Auth::user()->attendance->count() < 3)
                                    <th>{{Auth::user()->attendance->count()}}</th>
                                @else
                                    <th>
                                        You are not allowed to attend the final exam. Because You was absent the class {{Auth::user()->attendance->count()}}
                                        in this semester.
                                    </th>
                                @endif
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
