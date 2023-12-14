<div>

    <ul>
        <div class="px-6">
            @if(session('comment-created'))
            <div class="bg-white alert alert-comment-created px-6 py-4 text-2xl max-w-xs font-medium rounded text-black">
                {{session('comment-created')}}
            </div>
            <br/>
            @endif
        </div>

        <div class="px-6">
            @if(session('comment-edited'))
            <div class="bg-white alert alert-comment-edited px-6 py-4 text-2xl max-w-xs font-medium rounded text-black">
                {{session('comment-edited')}}
            </div>
            <br/>
            @endif
        </div>

        <div class="px-6">
            @if(session('comment-deleted'))
            <div class="bg-white alert alert-comment-deleted px-6 py-4 text-2xl max-w-xs font-medium rounded text-black">
                {{session('comment-deleted')}}
            </div>
            <br/>
            @endif
        </div>

        @foreach($allComments=$post->comments as $comment)
            <div class="bg-gray-700 rounded shadow-lg">

            <li><a href="{{ route('users.show', ['id' => $comment -> user_id]) }}"><span class="px-4 py-4 text-2xl max-w-xs font-medium text-gray-900 
                dark:text-white hover:font-bold hover:text-blue-400 ">{{$comment->user->name}}</a>:</span> 
                <span class="text-xl max-w-xs font-light text-gray-900 
                dark:text-white "> {{$comment->comment_text}} </span></li>
            @canDeleteComment($comment)
            <li class="px-4"><a href="{{ route('comments.destroy', 
            ['id' => $comment -> id])}}">
            <span class="bg-gray-800 hover:font-bold rounded shadow-lg text-lg font-semibold"> &nbsp;
                Delete Comment
                &nbsp;
                </span>
            </a></li>
            @endcanDeleteComment
            @canEditComment($comment)
            <li class="px-4"><a href="{{ route('comments.edit', ['id' => $comment ->id,
            'id2' =>$post->id])}}">
            <span class="bg-gray-800 hover:font-bold rounded shadow-lg text-lg font-semibold"> &nbsp;
            Edit Comment
            &nbsp;
            </span>
            </a></li>
            @endcanEditComment
            </div>
            <br/>
        @endforeach

    </ul>
    
    <h2 class="bg-gray-800 px-4 py-4 text-xl font-medium text-gray-900 
    dark:text-white shadow-lg">Add Comment</h2>
    <br/>
    <div class="px-6">
    <form style="color:black;" wire:submit.prevent="addComment">
        <textarea class=" px-6 text-2xl max-w-xs font-medium text-gray-900
         dark:text-black" wire:model="comment" placeholder="Add a comment..."></textarea>
         <br/>
        <button class="bg-gray-800 rounded px-6 py-2 text-2xl max-w-xs 
        font-medium text-gray-900 hover:font-bold dark:text-white shadow-lg" type="submit">Submit</button>
    </form>
    </div>
</div>