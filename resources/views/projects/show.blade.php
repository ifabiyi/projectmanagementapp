@extends('layouts.app')

@section('content')

<div class="col-md-8 col-lg-8 col-sm-8 pull-left ">
    @include('partials.success')
<div class="card card-body">
  
    <h1 class="display-3 font-italic border-bottom" >{{ $project->name }}</h1>
    <p>{{ $project->description }}</p>
    {{-- <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p> --}}
  </div>

  <!-- Example row of columns -->

  <br>
    
    <br>

    
 
  <div class="row" style="background: white; margin: 10px; ">
    <div class="col-md-12">
        @include('partials.comments')
      <form method="post" action="{{ route('comments.store') }}">
                                  @csrf
                                  @method('POST')
      
                                  <input type="hidden" name="commentable_type" value="App\Project">
                                  <input type="hidden" name="commentable_id" value="{{$project->id}}">
      
      
      
                                  <div class="form-group">
                                      <label for="comment-content">Comment</label>
                                      <textarea placeholder="Enter comment" 
                                                style="resize: vertical" 
                                                id="comment-content"
                                                name="body"
                                                rows="4" columns="8" spellcheck="false"
                                                class="form-control">
      
                                                
                                                </textarea>
                                  </div>
      
                                  
                                  <div class="form-group">
                                      <label for="comment-content">Proof of work done (Url/Photos)</label>
                                      <textarea placeholder="Enter url or screenshots" 
                                                style="resize: vertical" 
                                                id="comment-content"
                                                name="url"
                                                rows="2" spellcheck="false"
                                                class="form-control">
      
                                                
                                                </textarea>
                                  </div>
                                 
      
                                  <div class="form-group">
                                      <input type="submit" class="btn btn-primary"
                                             value="Submit"/>
                                  </div>
                              </form>
         
      
      
                              </div>
      
                            </div>
    
  
    </div>
 





    <aside class="col-md-4 ">
    
  
        <div class="p-4">
          <h4 class="font-italic">Actions</h4>
          <hr>
          <ol class="list-unstyled mb-0">
              <li><a href="/companies/{{ $project->id }}/edit">Edit</a></li>
              <li><a href="/projects/create">Create New Project</a></li>
              <li><a href="/companies">My Project</a></li>
          <br/>
            
            
           @if ($project->user_id == Auth::user()->id)
  
              <li>  
              <a   
              href="#"
                  onclick="
                  var result = confirm('Are you sure you wish to delete this project?');
                      if( result ){
                              event.preventDefault();
                              document.getElementById('delete-form').submit();
                      }
                          "
                          >
                  Delete
              </a>

              <form id="delete-form" action="{{ route('companies.destroy',[$project->id]) }}" 
                method="POST" style="display: none;">
                        @method('DELETE')
                        @csrf
              </form>

 
              
              
              </li>
              @endif
          </ol>

          <hr/>

            <h4>Add members</h4>
            <div class="row">
              <div class="col-lg-12 col-md-12 col-xs-12  col-sm-12 ">
              <form id="add-user" action="{{ route('projects.adduser') }}"  method="POST" >
                @csrf
                @method('POST')
                <div class="input-group mb-3">
                  <input class="form-control" name = "project_id" id="project_id" value="{{$project->id}}" type="hidden">
                  <input type="text" required class="form-control" id="email"  name = "email"
                   placeholder="Email" aria-describedby="basic-addon2">
                   <span class="input-group-btn">
                      <button class="btn btn-default" type="submit" id="addMember" >Add!</button>
                    </span>
                  {{-- <div class="input-group-append">
                      <span class="input-group-text"  id="addMember">Add!</span>
                    </div> --}}
                
                   
                </div><!-- /input-group -->
                </form>
              </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
<br/>

   

            <h4>Team Members</h4>
            <ol class="list-unstyled" id="member-list">
                @foreach($project->users as $user)
                <li><a href="#"> {{$user->email}} </a> </li>
              
              @endforeach
            </ol>

          </div>

          <!--<div class="sidebar-module">
            <h4>Members</h4>
            <ol class="list-unstyled">
              <li><a href="#">March 2014</a></li>
            </ol>
          </div> -->
        </div>
  
       
      </aside><!-- /.blog-sidebar -->



    @endsection