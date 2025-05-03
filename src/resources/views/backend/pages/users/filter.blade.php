<div id="filterTable">
    <div class="card-datatable table-responsive">
        <table class="datatables-products table item_table table-hover">
            <thead class="border-top">
                <tr>
                    <th>#</th>
                    <th>{{ __('user.user.created_at')}}</th>
                    <th>{{ __('user.user.full_name')}}</th>
                    <th>{{ __('user.user.user_name')}}</th>
                    <th>{{ __('user.user.email')}}</th>
                    <th>{{ __('user.user.phone')}}</th>
                    <th>{{ __('user.user.status')}}</th>
                    <th>{{ __('user.user.action')}}</th>
                </tr>
            </thead>
            <tbody>
                @php
                    function convertToBanglaNumber($number) {
                        $banglaNumbers = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
                        $number = strval($number);
                        $banglaNumber = '';
                        
                        for ($i = 0; $i < strlen($number); $i++) {
                            $digit = $number[$i];
                            $banglaNumber .= $banglaNumbers[$digit];
                        }
                        
                        return $banglaNumber;
                    }
                @endphp
                @foreach ($users as $user)
                    <tr id="deleteitem_remove_{{ $user->id }}">
                        <td>
                            {{ app()->getLocale() == 'bn' ? convertToBanglaNumber($loop->iteration) : $loop->iteration }}
        
                        </td>
                        <td>{{ $user->CreatedAtFormatted}}</td>
                        <td>{{ $user->full_name }}</td>
                        <td>{{ $user->user_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>
                            @if ($user->status == \App\Enums\Status::Active)
                                <span class="badge bg-label-success" text-capitalized="">{{ $user->status }}</span>
                            @else
                                <span class="badge bg-label-danger" text-capitalized="">{{ $user->status }}</span>
                            @endif
                           
                        </td>
                        <td>
                            <div class="d-inline-block text-nowrap">
                                
                                <a href="{{route('users.edit',$user->id)}}">
                                    <button class="btn btn-sm btn-icon edit-i"><i class="ti ti-edit"></i></button>
                                </a>
                                <button  id="confirm-text_{{$user->id}}"  class="btn btn-sm btn-icon delete-record delete-i"><i onClick="deleteConfirmation({{$user->id}},'{{ route("users.destroy", $user->id) }}')" class="ti ti-trash"></i></button>
                                   
                             
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center mb-2">
        {{ $users->links('backend.pagination.custome') }}
    </div>
</div>