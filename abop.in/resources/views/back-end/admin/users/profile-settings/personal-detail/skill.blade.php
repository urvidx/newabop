<div class="wt-tabscontenttitle">
    <h2>User Skills</h2>
</div>
<!-- <user_skills :ph_rate_skills="'{{ trans('lang.ph_rate_skills') }}'"></user_skills> -->
<div>
   <div class="wt-formtheme wt-skillsform">
      <!----> 
      <fieldset>
         <div class="form-group">
            <div class="form-group-holder">
               <span class="wt-select">
                  <select id="freelancer_skill" class="freelancer_skill">
                     @forelse($skills as $skill)
                     <option value="{{$skill->id}}">{{$skill->title}}</option>
                     @empty

                     @endforelse
                  </select>
               </span>
               <input type="number" placeholder="Rate Your Skill (0% to 100%)" id="selected_rating_value" class="form-control selected_rating_value">
            </div>
         </div>
         <div class="form-group wt-btnarea"><a href="javascript:void(0);" class="wt-btn addSkill">Add Skills</a></div>
      </fieldset>
   </div>
   <div class="wt-myskills">
      <ul id="skill_list" class="sortable list">
      	@forelse($freelancer_skills as $fsk)
      	@php
      	$skillName = DB::table('skills')
                ->where(['id'=>$fsk])->pluck('title');
                //echo'<pre>';print_r($skillName[0]);
      	$skillUser = DB::table('skill_user')
                ->where(['user_id'=>$userDetails->id,'skill_id'=>$fsk])->first();
      	@endphp
      	<li class="skill-element">
	        <div class="wt-dragdroptool"><a href="javascript:void(0)" class="lnr lnr-menu"></a></div>
	        <span class="skill-dynamic-html">
	        {{@$skillName[0]}} (<em class="skill-val">{{$skillUser->skill_rating ?? 0}}</em>%)</span> 
	        <span class="skill-dynamic-field sss">
	        	<input value="{{$skillUser->skill_rating ?? 0}}" class="valueField" type="number">
	        </span> 
	        <div class="wt-rightarea afterDiv">
	        	<a href="javascript:void(0);" skillId="{{$fsk}}" class="btn btn-sm btn-primary saveEdit">Save</a> 
	        	<a href="javascript:void(0);" class="btn btn-sm btn-primary cancelEdit">Cancel</a>
	        </div>
	        <div class="wt-rightarea beforeDiv">
	        	<a href="javascript:void(0);" class="wt-addinfo"><i skillId="{{$fsk}}" class="lnr lnr-pencil editSkill"></i></a> 
	        	<a href="javascript:void(0);" class="wt-deleteinfo delete-skill"><i skillId="{{$fsk}}" class="lnr lnr-trash deleteSkill"></i></a>
	        </div>
	      </li>
        @empty

        @endforelse
      </ul>
   </div>
</div>