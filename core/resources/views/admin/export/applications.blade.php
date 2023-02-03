

    <table>
        
        <thead>
            <tr role="row">

                <th><b>Applicant</b></th>
                <th>DOB</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Phone (alt)</th>
                <th>Address</th>
                <th>Age</th>

                <th>Application Category</th>
                <th>Application Type</th>
                <th>Apply Date</th>
                <th>Number Submission</th>
                
                

                @for($key=0; $key < 3; $key++)
                
                    <th>Submission Title (submission {{ $key+1 }} )</th>
                    <th>Media Type (submission {{ $key+1 }} )</th>
                    <th>Videographer Name (submission {{ $key+1 }} )</th>
    				<th>Videographer Phone (submission {{ $key+1 }} )</th>
    				<th>Videographer Email (submission {{ $key+1 }} )</th>
                    <th>Date Publishement (submission {{ $key+1 }} )</th>

                    <th>Publisher Name (submission {{ $key+1 }} )</th>
                    <th>Name of Publishers Representative (submission {{ $key+1 }} )</th>
                    <th>Representatives Designation (submission {{ $key+1 }} )</th>
                    <th>Representatives Organization (submission {{ $key+1 }} )</th>
                    <th>Representatives Mobile No (submission {{ $key+1 }} )</th>
                    <th>Representatives Email (submission {{ $key+1 }} )</th>

                    <th>Media Link (submission {{ $key+1 }} ) </th>
                    <th>Uploaded Media File 1 (submission {{ $key+1 }} )</th>
                    <th>Uploaded Media File 2(submission {{ $key+1 }} )</th>

                @endfor

            </tr>
        </thead>
        
        <tbody>

            @if($allApplications->count() == 0)
                <tr></tr>

                <tr style="text-align: center;">
                    <td class="text-danger" colspan='35'>
                        No Data Found
                    </td>
                </tr>
                
            @endif
            
            <tr> </tr>

            @foreach($allApplications as $application)

                <tr role="row" class="odd">
                    <td>{{$application->user->name}}</td>
                    <td>{{date('d.m.Y', strtotime($application->user->birth_date))}}</td>
                    <td>{{$application->user->email}}</td>
                    <td>{{$application->user->phone}}</td>
                    <td>{{$application->user->phone_alt}}</td>
                    <td>{{$application->user->address}}</td>
                    <td>{{$application->user->age->name}}</td>

                    <td>{{$application->category->name}}</td>
                    <td>{{$application->contentType->name}}</td>
                    <td>{{$application->created_at->format('d.m.Y')}}</td>
                    <td>
                        {{$application->relatedMedia->count()}}
                    </td>


                    @foreach($application->relatedMedia as $relatedMedia)

                        <td>{{$relatedMedia->title}}</td>
                        <td>{{$relatedMedia->mediaType->name}}</td>
                        <td>{{$relatedMedia->name_videographer ?? 'None'}}</td>
						<td>{{$relatedMedia->videographer_phone ?? 'None'}}</td>
						<td>{{$relatedMedia->videographer_email ?? 'None'}}</td>
                        <td>{{date('d.m.Y', strtotime($relatedMedia->date_publishment)) ?? 'None'}}</td>
                    
                        
                        <td>{{ $relatedMedia->publisher->publisher_name ?? 'None' }} </td>
                        <td>{{ $relatedMedia->publisher->representative_name ?? 'None' }} </td>
                        <td>{{ $relatedMedia->publisher->representative_designation ?? 'None' }}</td>
                        <td>{{ $relatedMedia->publisher->representative_organization ?? 'None' }}</td>
                        <td>{{ $relatedMedia->publisher->representative_phone ?? 'None' }}</td>
                        <td>{{ $relatedMedia->publisher->representative_email ?? 'None' }}</td>

                        <td>
                            @if($relatedMedia->mediaLinks)
                                 {{$relatedMedia->mediaLinks->media_link}}

                            @else
                                'None'

                            @endif
                       </td>

                        <td>
                            @if($relatedMedia->mediaFiles->count())

    							@foreach($relatedMedia->mediaFiles as $mediaFile)

    								{{$mediaFile->media_file}}

    							@endforeach

                            @else
                                'None'

							@endif
						</td>

                    @endforeach
                    
                </tr>

            @endforeach
                
        </tbody>
            
        <tfoot></tfoot>
            
    </table>