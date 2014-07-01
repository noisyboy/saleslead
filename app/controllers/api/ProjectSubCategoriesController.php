<?php
namespace Api;

class ProjectSubCategoriesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function sub_categories($id)
	{
		$sub_categories = \DB::table('project_sub_categories')
			->where('project_category_id',$id)
			->get();
		$sub = array();
		if($sub_categories)
		{
			foreach ($sub_categories as $subcategory)
			{
				$sub[$subcategory->id] = $subcategory->project_sub_category;
			}
		}
		

		return \Response::json(array(
			'error' => false,
			'subcategories' => $sub
			));
	}
}
