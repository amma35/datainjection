<?php
/*
 * @version $Id: rules.constant.php 5351 2007-08-07 11:57:46Z walid $
 -------------------------------------------------------------------------
 GLPI - Gestionnaire Libre de Parc Informatique
 Copyright (C) 2003-2007 by the INDEPNET Development Team.

 http://indepnet.net/   http://glpi-project.org
 -------------------------------------------------------------------------

 LICENSE

 This file is part of GLPI.

 GLPI is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.

 GLPI is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with GLPI; if not, write to the Free Software
 Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 --------------------------------------------------------------------------
 */
class DataInjectionModel extends CommonDBTM {

	var $mappings;
	var $model_id = -1;
		
	function DataInjectionModel($model_id)
	{
		$this->table="glpi_plugin_data_injection_models";
    	$this->type=-1;
    	$this->model_id = $model_id;
    	$this->mappings = new MappingCollection;
	}
	
	function getMappings()
	{
		return $this->mappings;
	}
	
	function loadAll()
	{
		$this->getFromDB($this->model_id);
		$this->loadMappings();
	}
	function loadMappings()
	{
		$this->mappings->getAllMappingsByModelID($this->model_id);
	}
	
	function getModelInfos()
	{
		return $this->fields;
	}
	
	function getModelName()
	{
		return $this->fields["name"];
	}
	
	function getModelType()
	{
		return $this->fields["type"];
	}
	
	function getModelComments()
	{
		return $this->fields["comments"];
	}
	
	function getModelID()
	{
		return $this->model_id;
	}
		
	function saveModel()
	{
		//Save or add model
		if (!isset($this->fields["ID"]))
			$this->add($this->fields);
		else
			$this->update($this->fields);
		
		//Save or add mappings
				
	}
}

?>