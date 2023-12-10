@extends('layouts.app')

@section('title', 'Post Creation')

@section('content')

    <form method="POST" action = "{{route('posts.store')}}">
        @csrf
        <ul style = "color:#ffffff;">
            <li>Post Title: <input style="color:black;" type="text" 
                name="post_title" value="{{ old('post_title')}}"/></li>
            <li>Post Text: <input style="color:black;" type="text" 
                name="post_text" value="{{ old('post_text')}}"/></li>
            <li>Add Tags:
                <select class="form-control" id="selectTag" name="tags[]"  
                onchange="addToSelectedTags()" style="color:black;" required focus>
                {{$tags = App\Models\Tag::all()}}
                @foreach($tags as $tag)
                    <option value="{{$tag->id}}">{{$tag->tag_name}}</option>
                @endforeach               
                </select>
            </li>

            <h2>Selected Tags:</h2>
            <ul id="selectedTags"></ul>

            <input type = "submit" value = "Submit"/>
        </ul>
        <a href="{{route('posts.index')}}" style="color:white;">Cancel</a>
    </form>

@endsection


<script>
    var selectedTags = [];

    function addToSelectedTags() {
        var dropdown = document.getElementById("selectTag");
        var selectedItem = document.getElementById("selectedItem");
        var selectedTagsList = document.getElementById("selectedTags");

        // Get the selected option
        var selectedOption = dropdown.options[dropdown.selectedIndex].text;

        // Add the selected fruit to the array
        /*selectedTags.push(selectedOption);

        updateSelectedTagsList();*/
        if (selectedTags.indexOf(selectedOption) === -1) {
                // Add the selected fruit to the array
                selectedTags.push(selectedOption);

                // Display the selected item

                // Update the list of selected fruits
                updateSelectedTagsList();
        } else {
                alert("The selected tag is already added.");
        }

    }

    function removeFromSelectedTags(index) {
            // Remove the selected fruit from the array
            selectedTags.splice(index, 1);

            // Update the list of selected fruits
            updateSelectedTagsList();
        }

    function updateSelectedTagsList() {
            var selectedTagsList = document.getElementById("selectedTags");
            selectedTagsList.innerHTML = "";

            // Update the list of selected fruits
            selectedTags.forEach(function (tag, index) {
                var listItem = document.createElement("li");
                listItem.textContent = tag;

                listItem.appendChild(document.createTextNode(" "));
                // Add a remove button next to each tag
                var removeButton = document.createElement("button");
                removeButton.textContent = "Remove";
                removeButton.onclick = function () {
                    removeFromSelectedTags(index);
                };

                listItem.appendChild(removeButton);
                selectedTagsList.appendChild(listItem);
            });
    }
</script>
