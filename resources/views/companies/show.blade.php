@extends('layouts.app')

@section('content')

<div class="col-md-8 col-lg-8 col-sm-8 pull-left ">
    @include('partials.success')
<div class="jumbotron">
  
    <h1 class="display-3 font-italic border-bottom" >{{ $company->name }}</h1>
    <p>{{ $company->description }}</p>
    {{-- <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p> --}}
  </div>

  <!-- Example row of columns -->
  <div class="row" style="background: white; margin: 10px; ">
      <a href="/projects/create" class="float-right btn btn-secondary btn-sm">Add Project</a>
    @foreach ($company->projects as $project)
    <div class="col-md-4">
      <h2>{{ $project->name }}</h2>
      <p>{{$project->description}} </p>
      <p><a class="btn btn-secondary" href="/projects/{{ $project->id }}" role="button">View Project &raquo;</a></p>
    </div>
    @endforeach
  </div>

</div>



    <aside class="col-md-4 ">
    
  
        <div class="p-4">
          <h4 class="font-italic">Actions</h4>
          <hr>
          <ol class="list-unstyled mb-0">
              <li><a href="/companies/{{ $company->id }}/edit">Edit</a></li>
              <li><a href="/projects/create/{{ $company->id }}">Add Project</a></li>
              <li><a href="/companies/{{ $company->id }}">My  Companies</a></li>
              <li><a href="/companies/create">Create new Company</a></li>

              <br/>
            
            
              <li>

                  
              <a   
              href="#"
                  onclick="
                  var result = confirm('Are you sure you wish to delete this Company?');
                      if( result ){
                              event.preventDefault();
                              document.getElementById('delete-form').submit();
                      }
                          "
                          >
                  Delete
              </a>

              <form id="delete-form" action="{{ route('companies.destroy',[$company->id]) }}" 
                method="POST" style="display: none;">
                        @method('DELETE')
                        @csrf
              </form>

 
              
              
              </li>
          </ol>
        </div>
  
       
      </aside><!-- /.blog-sidebar -->



    @endsection