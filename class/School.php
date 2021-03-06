<?php

namespace XoopsModules\Classroom;

//  ------------------------------------------------------------------------ //
//                XOOPS - PHP Content Management System                      //
//                    Copyright (c) 2000 XOOPS.org                           //
//                       <https://xoops.org>                             //
//  ------------------------------------------------------------------------ //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
//                                                                           //
//  You may not change or alter any portion of this comment or credits       //
//  of supporting developers from this source code or any supporting         //
//  source code which is considered copyrighted (c) material of the          //
//  original comment or credit authors.                                      //
//                                                                           //
//  This program is distributed in the hope that it will be useful,          //
//  but WITHOUT ANY WARRANTY; without even the implied warranty of           //
//  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            //
//  GNU General Public License for more details.                             //
//                                                                           //
//  You should have received a copy of the GNU General Public License        //
//  along with this program; if not, write to the Free Software              //
//  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA //
//  ------------------------------------------------------------------------ //
//  Author:  Mithrandir                                                      //
/**
 * Classes for managing Schools
 *
 *
 * @author  Jan Keller Pedersen
 * @package modules
 */

/**
 * School class
 *
 * @package    modules
 * @subpackage School
 */
class School extends \XoopsObject
{
    /**
     * Repository of divisions
     */
    public $divisions;

    /**
     * Constructor sets up {@link School} object
     */
    public function __construct()
    {
        $this->initVar('schoolid', XOBJ_DTYPE_INT);
        $this->initVar('name', XOBJ_DTYPE_TXTBOX);
        $this->initVar('location', XOBJ_DTYPE_TXTBOX);
        $this->initVar('description', XOBJ_DTYPE_TXTAREA);
        $this->initVar('head', XOBJ_DTYPE_INT);
        $this->initVar('headname', XOBJ_DTYPE_TXTBOX);
        $this->initVar('weight', XOBJ_DTYPE_INT);
    }

    /**
     * Add a division object to the school object
     * @param $division
     */

    public function addDivision(&$division)
    {
        $this->divisions[] =& $division;
    }

    /**
     * Updates cached template for school pages
     */
    public function updateCache()
    {
        require_once XOOPS_ROOT_PATH . '/class/template.php';
        global $xoopsModule;
        $xoopsTpl = new \XoopsTpl();
        $xoopsTpl->clear_cache('db:cr_school.tpl', 'mod_' . $xoopsModule->getVar('dirname') . '|' . md5('/modules/classroom/school.php?s=' . $this->getVar('schoolid')));
    }
}
