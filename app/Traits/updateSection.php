<?php
    namespace App\Traits;

    use App\Models\CTA;
    use App\Models\How;
    use App\Models\About;
    use App\Models\Banner;
    use App\Models\Client;
    use App\Models\Partner;
    use App\Models\Service;
    use App\Models\AboutElement;
    use App\Models\ClientElement;
    use App\Models\ServiceElement;
    use Illuminate\Http\Request;

    trait updateSection {
      
        public function banner($request)
        {
            $datas = $request->except('_token');
            $rules = [];
            foreach ($datas as $key => $val) {
                if($key == 'bg_video'){
                    $rules[$key] = 'mimes:mp4|max:20,480';
                }
                $rules[$key] = 'required';
            }
            $request->validate($rules);
    
            $section = Banner::firstOrNew();
    
            if($request->bg_video){
                $path = "public/sections/$request->section/";
                $old = @$section->bg_video ?? null;
                $section->bg_video = uploadFile($request->bg_video,$path,null, $old);
            }
    
            $section->heading     = $request->heading;
            $section->sub_heading = $request->sub_heading;
            $section->button_1_name = $request->button_1_name;
            $section->button_1_link = $request->button_1_link;
            $section->button_2_link = $request->button_2_link;
            $section->button_2_name = $request->button_2_name;
            $section->save();
        }
    
        public function about($request)
        {
    
            $datas = $request->except('_token');
            $rules = [];
            foreach ($datas as $key => $val) {
                if($key == 'image_1'){
                    $rules[$key] = 'mimes:mp4|max:5080';
                }
                if($key == 'image_2'){
                    $rules[$key] = 'mimes:mp4|max:5080';
                }
                if($key == 'image_3'){
                    $rules[$key] = 'mimes:mp4|max:5080';
                }
    
                $rules[$key] = 'required';
            }
            $request->validate($rules);
    
            $section = About::first();
    
            if($request->image_1){
                $path = "public/sections/$request->section/";
                $old = @$section->image_1 ?? null;
                $section->image_1 = uploadImage($request->image_1,$path,'701x701', $old);
            }
            if($request->image_2){
                $path = "public/sections/$request->section/";
                $old = @$section->image_2 ?? null;
                $section->image_2 = uploadImage($request->image_2,$path,'701x395', $old);
            }
            if($request->image_3){
                $path = "public/sections/$request->section/";
                $old = @$section->image_3 ?? null;
                $section->image_3 = uploadImage($request->image_3,$path,'698x440', $old);
            }
    
            $section->title = $request->title;
            $section->heading = $request->heading;
            $section->short_details = $request->short_details;
            $section->save();
    
        
        }
    
        public function services($request)
        {
        
            $datas = $request->except('_token');
            $rules = [];
            foreach ($datas as $key => $val) {
                $rules[$key] = 'required';
            }
            $request->validate($rules);
    
            $section = Service::first();
            $section->title = $request->title;
            $section->heading = $request->heading;
            $section->sub_heading = $request->sub_heading;
            $section->save();
    
        }
    
        public function clients($request)
        {
    
            $datas = $request->except('_token');
            $rules = [];
            foreach ($datas as $key => $val) {
                if($key == 'image'){
                    $rules[$key] = 'image|mimes:png,jpeg,jpg';
                }
                $rules[$key] = 'required';
            }
            $request->validate($rules);
    
            $section = Client::first();
    
            $section->title = $request->title;
            $section->heading = $request->heading;
            $section->sub_heading = $request->sub_heading;
            $section->save();
    
        
        }
        public function how($request)
        {
    
            $datas = $request->except('_token');
            $rules = [];
            foreach ($datas as $key => $val) {
                if($key == 'image'){
                    $rules[$key] = 'image|mimes:png,jpeg,jpg';
                }
                $rules[$key] = 'required';
            }
            $request->validate($rules);
    
            if($request->id){
                $section = How::findOrFail($request->id);
            } else{
                $section = new How();
            }
    
            $section->icon = $request->icon;
            $section->step = $request->step;
            $section->title = $request->title;
            $section->heading = $request->heading;
            $section->short_details = $request->short_details;
            $section->button_text = $request->btn_name;
            $section->button_link = $request->btn_link;
            if($request->image){
                $path = "public/sections/how/";
                $old = $section->image ?? null;
                $section->image = uploadImage($request->image,$path,'502x618', $old);
            
            }
            $section->save();
        }
    
        public function partners($request)
        {
        
        $request->validate([
            'title' => 'required_without:logo',
            'logo' => 'image|mimes:png,jpg'
        ]);
        
            $section = Partner::findOrFail($request->id);
            if($request->title){
                $section->title = $request->title;
            }
            $logos = (array)$section->logo;
            if($request->logo && $request->file){
                if(in_array($request->file,$logos)){
                    $key = array_search($request->file, $logos);
                    unset($logos[$key]);
                    $old = $request->file ?? null;
                    $upload = uploadImage($request->logo,'public/sections/partners/','161x40',$old);
                    $logos[] = $upload;
                    $section->logo = $logos;
                }    
            } elseif($request->logo){
                $upload = uploadImage($request->logo,'public/sections/partners/','161x40');
                $logos[] = $upload;
                $section->logo = $logos;
            }
            $section->update();
    
        }
        public function cta($request)
        {
            $datas = $request->except('_token');
            $rules = [];
            foreach ($datas as $key => $val) {
                $rules[$key] = 'required';
            }
            $request->validate($rules);
        
            $section = CTA::first();
            $section->title = $request->title;
            $section->button_text = $request->btn_name;
            $section->button_link = $request->btn_link;
            $section->save();
    
        }



        //elements

        public function aboutElements(Request $request)
        {
            $request->validate([
                'icon' => 'required',
                'title' => 'required',
            ]);

            $element = AboutElement::firstOrNew(['id'=>$request->id]);
            $element->icon = $request->icon;
            $element->title = $request->title;
            $element->about_id = $request->about_id;
            $element->save();
            return back()->with('success','About element has been updated');
        }


        public function removeAboutElements($id)
        {
            $element = AboutElement::findOrFail($id);
            $element->delete();
            return back()->with('success','About element has been removed');
        }

        public function serviceElements(Request $request)
        {
            $request->validate([
                'title' => 'required',
                'short_details' => 'required',
                'image' => 'image|mimes:png,jpg,jpeg|max:2048'
            ]);

            $element = ServiceElement::firstOrNew(['id'=>$request->id]);
            $element->title = $request->title;
            $element->service_id = $request->service_id;
            $element->short_details = $request->short_details;
            if($request->image) {
                $path = "public/sections/services/";
                $old = @$element->image ?? null;
                $element->icon_image = uploadImage($request->image,$path,'95x90', $old);
            }

            $element->save();
            return back()->with('success','Services has been updated');
        }

        public function removeServiceElements($id)
        {
            $element = ServiceElement::findOrFail($id);
            $element->delete();
            return back()->with('success','Services has been removed');
        }

        public function clientElements(Request $request)
        {
            $request->validate([
                'author' => 'required',
                'designation' => 'required',
                'quote' => 'required',
                'image' => 'image|mimes:png,jpg,jpeg|max:2048'
            ]);

            $element = ClientElement::firstOrNew(['id'=>$request->id]);
            $element->client_id = $request->client_id;
            $element->author = $request->author;
            $element->designation = $request->designation;
            $element->quote = $request->quote;
        
            if($request->image) {
                $path = "public/sections/clients/";
                $old = @$element->image ?? null;
                $element->image = uploadImage($request->image,$path,'446x446', $old);
            }

            $element->save();
            return back()->with('success','Clients has been updated');
        }

        public function removeClientElements($id)
        {
            $element = ClientElement::findOrFail($id);
            $element->delete();
            return back()->with('success','Services has been removed');
        }
        public function removePartner($file)
        {
            $section = Partner::firstOrFail();
            $logos = (array)$section->logo;
            if($file){
                if(in_array($file,$logos)){
                    $key = array_search($file, $logos);
                    unset($logos[$key]);
                    $section->logo = $logos;
                    $section->update();
                }
                return back()->with('success','Partner has been removed');
            }
            return back()->with('error','Partner not found');
        }
    
    }