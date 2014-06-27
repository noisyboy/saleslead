<?php namespace Api;

class RegionsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function area_regions($id)
	{
		$arearegions = \DB::table('regions')
			->where('area_id',$id)
			->get();
		$regions = array();
		if($arearegions)
		{
			foreach ($arearegions as $region)
			{
				$regions[$region->id] = $region->region;
			}
		}
		

		return \Response::json(array(
			'error' => false,
			'regions' => $regions
			));
	}




}
