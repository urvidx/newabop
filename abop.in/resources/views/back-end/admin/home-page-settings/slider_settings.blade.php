<div class="wt-tabscontenttitle la-switch-option">
<h6>Add Slider Images</h6>
</div>
<form method="post" id="FrmImgUpload" class=" mainDiv hide" action="javascript:void(0)" enctype="multipart/form-data">
        @csrf
<div class="wt-location wt-tabsinfo">
    <h6>{{{ trans('lang.title') }}}</h6>
    <div class="wt-settingscontent">
        <div class="wt-formtheme ">
            <div class="form-group">
               <input type="text" class="form-control slidetitle" name="title" required="required">
            </div>
        </div>
    </div>
</div>
<div class="wt-location wt-tabsinfo">
    <h6>Description</h6>
    <div class="wt-settingscontent">
        <div class="wt-formtheme ">
            <div class="form-group">
                <input type="text" name="description" class="form-control slidedescription" required="required">
            </div>
        </div>
    </div>
</div>
<div class="wt-location wt-tabsinfo">
    <h6>Image</h6>
    <div class="wt-settingscontent">
        <div class="wt-formtheme ">
            <div class="form-group">
                <input type="file" name="image" class="form-control fileimage" required="required">
            </div>
        </div>
    </div>
</div>
<div class="wt-updatall la-updateall-holder">
    <i class="ti-announcement"></i>
    <span>{{{ trans('lang.save_changes_note') }}}</span>
    <button type="submit" class="wt-btn addsliderImage">Save Changes</button>
</div>
</form>
<div class="resultDiv">

    <button class="wt-btn addSliderSection">Add Slider Image</button>
</div>

<div class="container">
     <div class="wt-location wt-tabsinfo">
        <br>
         <h6 class="slidesShows">Slides</h6>
         <table class="table mt-2 wt-tablecategories">
            <thead>
                <tr>
                    <th>Sr. No.</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
                    
            </thead>
            <tbody class="worktbodymain">
                @forelse($sliderImgs as $img)
                <tr class="{{$img->id}}">
                    <td class="sliderdetailId">{{$img->id}}</td>
                    <td class="sliderDetailImage"><img width="100" src="{{url('/public/sliderImages/thumbnail/'.$img->image)}}"></td>
                    <td class="sliderDetailTitle">{{$img->title}}</td>
                    <td class="sliderDetailDescription">{{$img->description}}</td>
                    <td><button  id="{{$img->id}}" class="removeSlide">Remove</button>
                        <a  data-toggle="modal" data-target=".bd-slider-modal-lg" id="{{$img->id}}" class=" editsliderbtn" href="#" id="{{$img->id}}" image="{{url('/public/sliderImages/thumbnail/'.$img->image)}}" workTitle="{{$img->title}}" descreption="{{$img->description}}">Edit</a>
                    </td>
                </tr>
                @empty
                <tr class="text-center">
                    <td colspan="5">
                        No Data Found.
                    </td>
                </tr>
                @endforelse
                
                
            </tbody>
        </table>
<!-- 
        {{-- @forelse($sliderImgs as $img)
         <div style="margin-bottom: inherit;" class="wt-settingscontent border">
            <div class="wt-formtheme ">
                <h4>Title: {{$img->title}}</h4>
                <h5>Description: {{$img->description}}</h5>
                <img src="{{url('/public/sliderImages/thumbnail/'.$img->image)}}"  class="">
                <br>
                <button style="margin: 5px;" id="{{$img->id}}" class="wt-btn removeSlide">Remove</button>
                <a style="margin: 5px;" data-toggle="modal" data-target=".bd-slider-modal-lg" id="{{$img->id}}" class="wt-btn editsliderbtn" href="#" id="{{$img->id}}" image="{{url('/public/sliderImages/thumbnail/'.$img->image)}}" workTitle="{{$img->title}}" descreption="{{$img->description}}">Edit</a>
            </div>
        </div>
        @empty
        <div class="wt-settingscontent">
            <div class="wt-formtheme ">
                <h3>No Data found.</h3>
            </div>
        </div>
        @endforelse --}} -->
     </div>
</div>
