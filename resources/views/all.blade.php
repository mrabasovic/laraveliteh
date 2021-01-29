@extends('master')

@section('title','All')

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

@section('content')

    <div class="food">
        <div class="food-header">
            <h2 class="food-heading">Feature Food</h2>
            @foreach($categories as $category)
        <button style="cursor: pointer; padding: 6px 10px; background-color: #0275d8; border: none; border-radius: 10px;"><a style="text-decoration: none; color: white;" href="/{{$category->id}}">{{$category->name}}</a></button>
        @endforeach

    <form action="/add-category" method="post">
        {{ csrf_field() }}
        <input type="text" name="name" placeholder="add new category">
        <button type="submit">Save</button>
    </form>

        </div>
        <div class="food-container">

            <div class="food-list">
            @foreach($categories as $category)
        @foreach($category->recipes as $recipe)
        <div class="food-item">
                    <div class="food-media">

                    <img src="{{$recipe->url}}" alt="" class="food-image">
                    <i class="fa fa-heart food-like"></i>
                    </div>

                    <div class="food-item-header">
                        <h3 class="food-name">{{$recipe->name}}</h3>
                        <div class="food-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>

                    </div>
                    <p class="food-desc">{{$recipe->description}}</p>
                    <a href="{{$category->id}}/{{$recipe->id}}">More..</a>
                </div>

        @endforeach
    @endforeach

            </div>
        </div>
    </div>



@endsection
