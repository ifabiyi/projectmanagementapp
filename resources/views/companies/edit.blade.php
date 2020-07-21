@extends('layouts.app')

@section('content')

<div class="col-md-8 col-lg-8 col-sm-8 ">
    <h1>Update company </h1>
  <!-- Example row of columns -->
  <div class="row" style="background: white; margin: 10px; ">
   
    <div class="col-md-12">
        <form method="POST" action="{{ route('companies.update',$company->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="company-name">Name<span class="required">*</span></label>
                <input   placeholder="Enter name"  
                          id="company-name"
                          required
                          name="name"
                          spellcheck="false"
                          class="form-control"
                          value="{{ $company->name }}"
                           />
            </div>
            <div class="form-group">
                <label for="company-content">Description</label>
                <textarea placeholder="Enter description" 
                          style="resize: vertical" 
                          id="company-content"
                          name="description"
                          rows="5" spellcheck="false"
                          class="form-control autosize-target text-left">
                          {{ $company->description }}</textarea>
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
                  <li><a href="/companies/{{ $company->id }}"><i class="fa fa-building-o" aria-hidden="true"></i>
                   View companies</a></li>
                  <li><a href="/companies"><i class="fa fa-building" aria-hidden="true"></i> All companies</a></li>
                  
                </ol>
          </ol>
        </div>
  
       
      </aside><!-- /.blog-sidebar -->



    @endsection