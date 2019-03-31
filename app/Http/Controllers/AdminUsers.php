<?php

namespace App\Http\Controllers;

use App\Admin;
use App\AppUserToken;
use App\Tag;
use App\UserLog;
use App\VdoCategory;
use App\VdoSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use File;

class AdminUsers extends Controller
{


    public function getPath()
    {
        $pattern = "/.com/";
        $server_name = $_SERVER['SERVER_NAME'];
        //echo "Server Name:".$server_name;

        $path = public_path();

        if (preg_match($pattern, $server_name)) {

            //$path = str_replace("ayojok_base/public", "public_html", $path);
        }
        //echo "<br> $path";
        return $path;
    }

    public function saveUserLOg($user,$action){
        $userLog = new UserLog();

        $userLog->user_name = $user;
        $userLog->Action = $action;

        $userLog->save();
    }


    public function showPage()
    {
        $admin_users = Admin::all();
        return view('admin.admin_users')->with('admin_users', $admin_users);
    }
    public function showUserLog()
    {
        $admin_users = UserLog::all();
        return view('admin.user_log')->with('admin_users', $admin_users);
    }

    public function addNewUser()
    {
        return view('admin.add_adminUser');
    }

    public function addNewUserSubmit(Request $request)
    {

        $user = new Admin();

        $user->name = $request->name;
        $user->job_title = $request->role;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();


        $this->saveUserLOg(Auth::user()->name,"Add New User || user ID ($user->id)");


        return Redirect::to('admin/users');

    }


    /*Category*/
    public function showVideoCategories()
    {
        $vdo_categories = VdoCategory::all();
        return view('admin.vdo_categories')->with('vdo_categories', $vdo_categories);
    }

    public function addNewCategory()
    {
        //$vdo_categories = VdoCategory::all();
        return view('admin.add_videoCategory');
    }

    public function addCategorySubmit(Request $request)
    {
        //return $request;


        $fileurl = "";
        /** Update Profile Image **/
        if ($request->hasFile('profile_image')) {
            $path = $this->getPath();
            $destinationPath = $path . '/img/category_images/';
            $image = $request->file('profile_image');
            $input['imagename'] = date('d_m_y_his') . '_' . $image->getClientOriginalName(); //. $image->getClientOriginalExtension();
            //echo $input['imagename'];
            if ($image->move($destinationPath, $input['imagename'])) {
                $fileurl = 'img\category_images\\' . $input['imagename'];
                //echo $fileurl;
                //vendors::where('id', $add->id)->update(['profile_img' => $fileurl]);
            } else {
                echo "Error";
            }
        }

        $vdo_category = new VdoCategory();
        $vdo_category->title = $request->vendor_title;
        $vdo_category->image = $fileurl;
        $vdo_category->save();


        $this->saveUserLOg(Auth::user()->name,"Add New Category || Category ID ($vdo_category->id)");


        return Redirect::to('admin/vdo-categories');

    }

    public function deleteVideoCategory($id)
    {


        $path = $this->getPath();

        $vdo_category = VdoCategory::find($id);
        //exit;
        //$vdo_category->vdoSubCategory()->delete();



        $vdo_subCategories = VdoSubCategory::where('VdoCategory_id',$vdo_category->id)->get();

        foreach($vdo_subCategories as $sub_category){


            //echo $sub_category->title;


            /**   Delete image from subCategory directory **/
            $logopath = $path . '\\' . $sub_category->image;
            $logopath = str_replace("\\", '/', $logopath);
            if (File::exists($logopath)) {
                File::delete($logopath);
            }

            $sub_category->delete();
        }

        //exit;

        /**   Delete image from subCategory directory **/
        $logopath = $path . '\\' . $vdo_category->image;
        $logopath = str_replace("\\", '/', $logopath);
        if (File::exists($logopath)) {
            File::delete($logopath);
        }

        $this->saveUserLOg(Auth::user()->name,"Delete Category || Category ID ($vdo_category->id)");


        $vdo_category->delete();

        return Redirect::back();
    }

    public function editVideoCategory($id)
    {
        $vdo_category = VdoCategory::find($id);
        //$vdo_category->delete();
        return view('admin.add_videoCategory')->with('vdo_category', $vdo_category);

    }

    public function editVideoCategorySubmit(Request $request, $id)
    {
        //echo $id;
        $vdo_category = VdoCategory::find($id);

        $vdo_category->title = $request->vendor_title;

        /** Update Profile Image **/
        if ($request->hasFile('profile_image')) {
            $path = $this->getPath();
            $destinationPath = $path . '/img/category_images/';
            $image = $request->file('profile_image');
            $input['imagename'] = date('d_m_y_his') . '_' . $image->getClientOriginalName(); //. $image->getClientOriginalExtension();
            //echo $input['imagename'];
            if ($image->move($destinationPath, $input['imagename'])) {
                $fileurl = 'img\category_images\\' . $input['imagename'];
                $vdo_category->image = $fileurl;
                //echo $fileurl;
                //vendors::where('id', $add->id)->update(['profile_img' => $fileurl]);
            } else {
                echo "Error";
            }
        }

        $vdo_category->save();

        $this->saveUserLOg(Auth::user()->name,"Edit Category || Category ID ($vdo_category->id)");


        return Redirect::to('admin/vdo-categories');
    }



    /*Sub Category*/
    public function showVideoSubCategories()
    {
        $vdo_categories = VdoSubCategory::all();
        //return $vdo_categories;
        return view('admin.vdo_subcategories')->with('vdo_categories', $vdo_categories);
    }

    public function addNewSubCategory()
    {
        $vdo_categories = VdoCategory::all();
        return view('admin.add_videoSubCategory')->with('vdo_categories', $vdo_categories);
    }

    public function addSubCategorySubmit(Request $request)
    {
        //return $request;


        $fileurl = "";
        /** Update Profile Image **/
        if ($request->hasFile('profile_image')) {
            $path = $this->getPath();
            $destinationPath = $path . '/img/subcategory_images/';
            $image = $request->file('profile_image');
            $input['imagename'] = date('d_m_y_his') . '_' . $image->getClientOriginalName(); //. $image->getClientOriginalExtension();
            //echo $input['imagename'];
            if ($image->move($destinationPath, $input['imagename'])) {
                $fileurl = 'img\subcategory_images\\' . $input['imagename'];
                //echo $fileurl;
                //vendors::where('id', $add->id)->update(['profile_img' => $fileurl]);
            } else {
                echo "Error";
            }
        }

        $vdo_category = new VdoSubCategory();
        $vdo_category->VdoCategory_id = $request->category_id;
        $vdo_category->title = $request->vendor_title;
        $vdo_category->image = $fileurl;
        $vdo_category->save();

        $this->saveUserLOg(Auth::user()->name,"Add New SubCategory || SubCategory ID ($vdo_category->id)");


        return Redirect::to('admin/vdo-subcategories');

    }

    public function deleteVideoSubCategory($id)
    {
        $vdo_category = VdoSubCategory::find($id);
        //exit;


        $path = $this->getPath();

        /**   Delete image from subCategory directory **/
        $logopath = $path . '\\' . $vdo_category->image;
        $logopath = str_replace("\\", '/', $logopath);
        if (File::exists($logopath)) {
            File::delete($logopath);
        }

        $this->saveUserLOg(Auth::user()->name,"Delete SubCategory || SubCategory ID ($vdo_category->id)");


        $vdo_category->delete();
        return Redirect::back();
    }

    public function editVideoSubCategory($id)
    {

        $vdo_categories = VdoCategory::all();

        $vdo_category = VdoSubCategory::find($id);

        return view('admin.add_videoSubCategory')->with('vdo_category', $vdo_category)->with('vdo_categories', $vdo_categories);

    }

    public function editVideoSubCategorySubmit(Request $request, $id)
    {
        //echo $id;
        $vdo_category = VdoSubCategory::find($id);

        $vdo_category->VdoCategory_id = $request->category_id;
        $vdo_category->title = $request->vendor_title;

        /** Update Profile Image **/
        if ($request->hasFile('profile_image')) {
            $path = $this->getPath();
            $destinationPath = $path . '/img/subcategory_images/';
            $image = $request->file('profile_image');
            $input['imagename'] = date('d_m_y_his') . '_' . $image->getClientOriginalName(); //. $image->getClientOriginalExtension();
            //echo $input['imagename'];
            if ($image->move($destinationPath, $input['imagename'])) {
                $fileurl = 'img\subcategory_images\\' . $input['imagename'];
                $vdo_category->image = $fileurl;
                //echo $fileurl;
                //vendors::where('id', $add->id)->update(['profile_img' => $fileurl]);
            } else {
                echo "Error";
            }
        }

        $vdo_category->save();

        $this->saveUserLOg(Auth::user()->name,"Edit SubCategory || SubCategory ID ($vdo_category->id)");


        return Redirect::to('admin/vdo-subcategories');
    }





    /*Tags*/
    public function showTags()
    {
        $vdo_categories = Tag::all();
        return view('admin.vdo_tags')->with('vdo_categories', $vdo_categories);
    }

    public function addNewTag()
    {

        return view('admin.add_videoTag');
    }

    public function addTagSubmit(Request $request)
    {
        //return $request;


        $vdo_category = new Tag();
        $vdo_category->title = $request->vendor_title;
        $vdo_category->save();

        $this->saveUserLOg(Auth::user()->name,"Add New Tag || Tag ID ($vdo_category->id)");


        return Redirect::to('admin/tags');

    }

    public function deleteTag($id)
    {
        $vdo_category = Tag::find($id);
        //exit;

        $this->saveUserLOg(Auth::user()->name,"Delete Tag || Tag ID ($vdo_category->id)");


        $vdo_category->delete();
        return Redirect::back();
    }

    public function editTag($id)
    {


        $vdo_category = Tag::find($id);

        return view('admin.add_videoTag')->with('vdo_category', $vdo_category);

    }

    public function editTagSubmit(Request $request, $id)
    {
        //echo $id;
        $vdo_category = Tag::find($id);

        $vdo_category->title = $request->vendor_title;

        $vdo_category->save();

        $this->saveUserLOg(Auth::user()->name,"Edit Tag || Tag ID ($vdo_category->id)");


        return Redirect::to('admin/tags');
    }





    /*App User Tokens*/
    public function appUsersToken()
    {
        $vdo_categories = AppUserToken::all();
        return view('admin.app_tokens')->with('vdo_categories', $vdo_categories);
    }

    public function addAppUsersToken()
    {

        return view('admin.add_AppUserToken');
    }

    public function addAppUsersTokenSubmit(Request $request)
    {
        //return $request;


        $vdo_category = new AppUserToken();
        $vdo_category->app_token = $request->vendor_title;
        $vdo_category->save();


        $this->saveUserLOg(Auth::user()->name,"Add New AppUserToken || AppUserToken ID ($vdo_category->id)");


        return Redirect::to('admin/appUsersToken');

    }

    public function deleteAppUsersToken($id)
    {
        $vdo_category = AppUserToken::find($id);
        //exit;
        $this->saveUserLOg(Auth::user()->name,"Delete AppUserToken || AppUserToken ID ($vdo_category->id)");

        $vdo_category->delete();
        return Redirect::back();
    }

    public function editAppUsersToken($id)
    {


        $vdo_category = AppUserToken::find($id);
        //$vdo_category->delete();
        return view('admin.add_AppUserToken')->with('vdo_category', $vdo_category);

    }

    public function editAppUsersTokenSubmit(Request $request, $id)
    {
        //echo $id;
        $vdo_category = AppUserToken::find($id);

        $vdo_category->app_token = $request->vendor_title;

        $vdo_category->save();

        $this->saveUserLOg(Auth::user()->name,"Edit AppUserToken || AppUserToken ID ($vdo_category->id)");

        return Redirect::to('admin/appUsersToken');
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
