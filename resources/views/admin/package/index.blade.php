@extends('admin.layouts.admin')

@section('title', __('views.package.title'))

@section('content')

    <div class="pull-left">
        <a class="btn btn-primary" data-toggle="tooltip" data-placement="top"  href="{{ route('admin.packages.create')}}"> <i class="fa fa-plus"></i>    Add New Package  </a>
    </div>


    <div class="row">
        <table class="table table-responsive table-striped table-hover">
            <thead class="text-nowrap">
            {{--  <tr>
                 <th>@sortablelink('type', __('views.package.type'),['page' => $packages->currentPage()])</th>
                <th>@sortablelink('name',  __('views.package.name'),['page' => $packages->currentPage()])</th>
                <th>@sortablelink('active', __('views.package.active'),['page' => $packages->currentPage()])</th>
                <th>@sortablelink('price', __('views.package.price'),['page' => $packages->currentPage()])</th>
                <th>@sortablelink('category', __('views.package.category'),['page' => $packages->currentPage()])</th>
                <th>@sortablelink('created_at', __('views.admin.users.index.table_header_5'),['page' => $packages->currentPage()])</th>
                <th>@sortablelink('updated_at', __('views.admin.users.index.table_header_6'),['page' => $packages->currentPage()])</th> 
                <th>@sortablelink('Actions')</th>
            </tr> --}

            {{-- <tr>
                <th>{{ __('views.package.type')}}</th>
               <th>{{__('views.package.name')}}</th>
               <th>{{ __('views.package.active')}}</th>
               <th>{{__('views.package.price')}}(RM)</th>
               <th>{{__('views.package.category')}}</th>
              
               <th>Actions</th>
           </tr>     --}}

            </thead>
            <tbody>
             @foreach($packages as $package)
                <tr >
                    <td colspan="2" ><button  style= "padding: 10px 10px; font-size:15px; text-align: left;border-radius: 8px; width: 100%;display: inline-block; background-color: #777;color:white;" onclick="openPackages('{{$package->name}}','{{$package->type}}');" > PAKEJ {{ $package->type }}  :  {{ $package->name }}</button></td>
                </tr>
                <tr id="content{{$package->type}}" style="display:none;">
                <td ><table class="table table-responsive table-striped table-hover">
                     <thead class="text-nowrap">
                        {{-- <th>@sortablelink('type', __('views.package.type'),['page' => $packages->currentPage()])</th>
                        <th>@sortablelink('name',  __('views.package.name'),['page' => $packages->currentPage()])</th> --}}
                        <th>@sortablelink('category', __('views.package.category'),['page' => $packages->currentPage()])</th>
                        <th>@sortablelink('price', __('views.package.price'),['page' => $packages->currentPage()])</th>
                        <th>@sortablelink('active', __('views.package.active'),['page' => $packages->currentPage()])</th>
                        <th>@sortablelink('created_at', __('views.admin.users.index.table_header_5'),['page' => $packages->currentPage()])</th>
                        <th>@sortablelink('updated_at', __('views.admin.users.index.table_header_6'),['page' => $packages->currentPage()])</th> 
                        <th>@sortablelink('Actions')</th>
                    </thead>
                    <tbody id="packages{{$package->type}}">
                        
                    </tbody>
                    </table> 
                </td>
                </tr>
                        {{-- <td>
                        @if($package->active)
                            <span class="label label-primary">{{ __('views.admin.users.index.active') }}</span>
                        @else
                            <span class="label label-danger">{{ __('views.admin.users.index.inactive') }}</span>
                        @endif
                    </td>
                    <td>{{ number_format($package->price, 2) }}</td>
                    <td>
                     @if($package->category_id == 1)
                            <span>{{ __('views.admin.pakej_1') }}</span>
                        @elseif($package->category_id == 2)
                            <span>{{ __('views.admin.pakej_2') }}</span>
                        
                        @elseif($package->category_id == 3)
                            <span>{{ __('views.admin.pakej_3') }}</span>
                        @elseif($package->category_id == 4)
                            <span>{{ __('views.admin.pakej_4') }}</span>
                        @elseif($package->category_id == 5)
                            <span>Umum</span>
            
                    @endif
                    </td> 
                    <td>{{ \Carbon\Carbon::parse($package->created_at)->format('d/m/Y h:m:s')}}</td>
                    <td>{{ \Carbon\Carbon::parse($package->updated_at)->format('d/m/Y  h:m:s')}}</td>
                    <td>
                        <a class="btn btn-xs btn-primary" href="{{ route('admin.packages.show', [$package->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.users.index.show') }}">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a class="btn btn-xs btn-info" href="{{ route('admin.packages.edit', [$package->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.users.index.edit') }}">
                            <i class="fa fa-pencil"></i>
                        </a>
                    @if(!$user->hasRole('administrator'))
                            <a href="{{ route('admin.packages.destroy', [$package->id]) }}" class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.users.index.delete') }}">
                                <i class="fa fa-trash"></i>
                            </a>
                    @endif
                    </td>--}}
               
            @endforeach 
            </tbody>
        </table>
        <div class="center-block">
            <div class="row">
                <div class="col-xs-12">
                  <div class="explore-pagination">
                    <nav>
                      <div class="pagination"> {{ $packages->links() }}</div>
                    </nav>
                  </div>
                </div>
              </div>   
            
        </div>
    </div>
@endsection

@section('scriptS')
<script>
    
function openPackages(id,type){
  
        $.ajax({
          type:'get',
          url:'/api/test/'+ id,
          success: function(data) {
            
            $("#packages"+type).html("");
            data.forEach(function(index) {
                var showPostUri = "{{route('admin.packages.show',['/'])}}"+"/"+index.id ;
                var editPostUri ="{{route('admin.packages.index')}}"+"/"+index.id+"/edit";
                var deletePostUri = "{{route('admin.packages.index')}}"+"/"+index.id+"/destroy";
               
                 
                var tr = $("<tr style='width:100%'></tr>");
                if(index.category_id==1)  
                tr.append("<td> Student with IC</td>");
                else if(index.category_id==2)  
                tr.append("<td> Adult with IC</td>");
                else if(index.category_id==3)  
                tr.append("<td> Student without IC</td>");
                else if(index.category_id==4)  
                tr.append("<td> Adult without IC</td>");
                else if(index.category_id==5)  
                tr.append("<td> General </td>");
                tr.append("<td>" + index.price.toFixed(2) + "</td>");
                 if(index.active==1)  
                tr.append("<td><span class='label label-primary'>Active</span></td>");
                else
                tr.append("<td><span class='label label-primary'>Not Active</span></td>");
                tr.append("<td>" + index.created_at+ "</td>");
                tr.append("<td>" + index.updated_at + "</td>");
                 tr.append("<td><a class='btn btn-xs btn-primary' href='"+showPostUri+
                 "' data-toggle='tooltip' data-placement='top' data-title='Details'><i class='fa fa-eye'></i></a><a class='btn btn-xs btn-info' href='"+editPostUri+
                 "' data-toggle='tooltip' data-placement='top' data-title='Edit'><i class='fa fa-pencil'></i> </a><a href='"+deletePostUri+
                 "' class='btn btn-xs btn-danger' data-toggle='tooltip' data-placement='top' data-title='Delete'> <i class='fa fa-trash'></i> </a></td>");
                $("#packages"+type).append(tr);
            } );
                var content = $("#content"+type);
                $(content).toggle();
       
            
        },
         error: function(data) {
          }
        });
     // hides matched elements if shown, shows if hidden 
     //$(".content", $(this).next()).toggle(); 
   
}      
//         // hides children divs if shown, shows if hidden 
//          //   $(this).children(".content").show(); 
    

</script>

