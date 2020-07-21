@extends('layouts.app')

@section('content')

<div class="col-md-8 col-lg-8 col-sm-8 ">
    <h1>Update project </h1>
  <!-- Example row of columns -->
  <div class="row" style="background: white; margin: 10px; ">
   
    <div class="col-md-12">
        <form method="POST" action="{{ route('projects.store') }}">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="project-name">Name<span class="required">*</span></label>
                <input   placeholder="Enter name"  
                          id="project-name"
                          required
                          name="name"
                          spellcheck="false"
                          class="form-control"
                          />
                          {{-- here am passing the company id i recieved from the 
                          controller in to this form as an hidden field --}}
                          @if($companies == null)
                          <input   
                          class="form-control"
                          type="hidden"
                                  name="company_id"
                                  value="{{ $company_id }}"
                                   />
                          </div>

                          @endif
            </div>


            @if($companies != null)
            <div class="form-group">
                <label for="company-content">Select company</label>

                <select name="company_id" class="form-control" > 

                @foreach($companies as $company)
                        <option value="{{$company->id}}"> {{$company->name}} </option>
                      @endforeach
                </select>
            </div>
            @endif

            <div class="form-group">
                <label for="project-content">Description</label>
                <textarea placeholder="Enter description" 
                          style="resize: vertical" 
                          id="project-content"
                          name="description"
                          rows="5" spellcheck="false"
                          class="form-control autosize-target text-left">
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



    <aside class="col-md-4">
    
  
        <div class="p-4">
          <h4 class="font-italic">Actions</h4>
          <hr>
          <ol class="list-unstyled mb-0">
                  <li><a href="/projects"><i class="fa fa-building-o" aria-hidden="true"></i> My projects</a></li>
             
                </ol>
          </ol>
        </div>
  
       
      </aside><!-- /.blog-sidebar -->



    @endsection