<div class="row">
    <div class="col-md-12 col-sm-12  col-xs-12 col-lg-12">
        
            <!-- Fluid width widget -->        
          <div class="card">
               
                    <h3 class="card-title">
                        <span class="glyphicon glyphicon-comment"></span> 
                        Recent Comments
                    </h3>
                    <hr>
                
                <div class="card-body">
                    <ul class="media-list">
                        @foreach ($comments as $comment)

                        <li class="media">
                            <div class="media-left">
                                <img src="http://placehold.it/60x60" class="img-circle">
                            </div>
                            <div class="media-body">
                                <h6 class="media-heading">
                                <a href=" users/{{$comment->user->id}}"> {{$comment->user->first_name}} {{$comment->user->last_name}}
                                      - {{$comment->user->email}} </a>
                                    <br>
                                    <small>
                                        commented on {{$comment->created_at}}</a>
                                    </small>
                                </h4>
                                <p>
                                    {{ $comment->body }}
                                     </p>
                                      <b>Proof:</b>
                                    <p>{{$comment->url}}</p>
                            </div>
                        </li>
                        @endforeach 

                    </ul>
                </div>
                </div>
            </div>
            <!-- End fluid width widget --> 
            
    </div>
  