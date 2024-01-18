@props(['comment'])
    <ul>
        <li>
            <div class="author-thumb">
              <img src="{{$comment->profile_photo_path}}" alt="" width="70" height="70" class="rounded-pic">
            </div>
            <div class="right-content">
              <h4>{{$comment->name}}<span>{{$comment->created_at->format('Y-m-d')}}</span></h4>
              <p>{{$comment->body}}</p>
            </div>
        </li>
    </ul>