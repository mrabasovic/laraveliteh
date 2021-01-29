@extends('master')

@section('title','Category')

@section('content')

<style>
    @import url("https://fonts.googleapis.com/css?family=Roboto:300,400,400i,700");
* {
  box-sizing: border-box;
}

img {
    height: 260px;
  max-width: 100%;
  display: block;
}

body {
  background-color: #FEB649;
  padding: 50px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-family: "Roboto";
}

.arrows {
  display: flex;
}

.arrow {
  width: 35px;
  height: 35px;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  border: 0;
  outline: none;
  color: white;
  font-size: 16px;
  background-color: #E5E5E5;
}
.arrow.is-active {
  background-color: #FF4C01;
}

.food {
  width: 100%;
  background-color: white;
  padding: 50px 80px;
}
.food-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 50px;
}
.food-heading {
  font-size: 30px;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 3px;
}
.food-container {
  display: flex;
}
.food-container > * {
  width: 80%;
}
.food-media {
  position: relative;
  margin-bottom: 20px;
}
.food-like {
  color: #FF4C01;
  width: 30px;
  height: 30px;
  border-radius: 100px;
  background-color: white;
  display: flex;
  align-items: center;
  justify-content: center;
  position: absolute;
  right: 15px;
  bottom: 15px;
  cursor: pointer;
}
.food-item-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 20px;
  font-size: 20px;
}
.food-name {
  color: #FF4C01;
  font-weight: 500;
}
.food-rating {
  color: #FF4C01;
}
.food-desc {
  line-height: 1.6;
  font-weight: 300;
  font-size: 14px;
}
.food-list {
  display: flex;
  flex-wrap: wrap;
}
.food-list .food-item {
  width: calc(50% - 25px);
  margin-left: 25px;
  margin-bottom: 30px;
}
.food-list .food-item-header {
  font-size: 14px;
  margin-bottom: 10px;
}
.food-list .food-name {
  color: #111111;
}
.food-list .food-like {
  font-size: 10px;
  width: 20px;
  height: 20px;
}

@media screen and (max-width: 1023px) {
  .food-container {
    flex-direction: column;
  }
  .food-container > * {
    width: 100%;
  }

  .food-feature {
    margin-bottom: 30px;
  }

  .food-list {
    flex-direction: column;
  }
  .food-list .food-item {
    margin-left: 0;
    width: 100%;
  }
}
</style>


<div class="food">


    <h1>{{$category->name}}</h1>
    <p style="display: inline-block;">Add new recipe</p>
    <form style="margin-bottom: 50px; display: inline-block;" action="/add-recipe" method="post">
        {{ csrf_field() }}
        <input style="padding: 4px ; border: 1px solid grey; margin-right: 7px; margin-left: 5px;" type="text" name="name" placeholder="name">
        <input style="padding: 4px; border: 1px solid grey; margin-right: 7px; margin-left: 5px;" type="text" name="description" placeholder="description">
        <input style="padding: 4px; border: 1px solid grey; margin-right: 7px; margin-left: 5px;" type="text" name="time" placeholder="time">
        <input style="padding:4px; border: 1px solid grey; margin-right: 7px; margin-left: 5px;" type="text" name="author" placeholder="author">
        <input style="padding:4px; border: 1px solid grey; margin-right: 7px; margin-left: 5px;" type="text" name="url" placeholder="url">
        <input style="display:none;" type="text" name="category_id" value="{{$category->id}}">
        <button style="color: white; cursor: pointer; padding: 6px 10px; background-color: #0275d8; border: none; border-radius: 6px;" type="submit">Save</button>
    </form>

        <div class="food-container">

            <div class="food-list">
            @foreach($category->recipes as $recipe)
        <div class="food-item">
                    <div class="food-media">

                    <img src="{{$recipe->url}}" alt="" class="food-image">
                    <i class="fa fa-heart food-like"></i>
                    </div>

                    <div class="food-item-header">
                        <h3 class="food-name">{{$recipe->name}}</h3>
                    </div>
                    <p class="food-desc">{{$recipe->description}}</p>
                    <a href="{{$category->id}}/{{$recipe->id}}">More..</a>
                </div>

        @endforeach

            </div>
        </div>
    </div>



@endsection

