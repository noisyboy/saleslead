<?php

class LeadTypeController extends BaseController {

		public function getIndex()
		{
			$lead_types = LeadType::all();
			foreach ($lead_types as $lead_type)
			{
			  var_dump($lead_type->lead_type);
			}
		}

		public function getAddtype()
		{
			$lead_type = new LeadType;
			$lead_type->lead_type = 'Rencie';
			$lead_type->save();
		}

		public function postProfile()
		{
				//
		}

		public function anyLogin()
		{
				//
		}
}