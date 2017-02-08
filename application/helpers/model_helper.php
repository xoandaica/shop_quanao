<?php

if (!function_exists('modelCheckAdd')) {

    /**
     * Check data for table
     *
     * Check data for table before insert to database
     * 
     * @param array $tableDef Definition of table
     * @param array $data Data to insert
     */
    function modelCheckAdd($tableDef, $data) {
        if (!isset($tableDef) || !isset($data) || !is_array($tableDef) || !is_array($data)) {
            return false;
        }

        $newdata = array();

        foreach ($tableDef as $name => $val) {
            if ($val) {
                if (!isset($data[$name]) || (strlen($data[$name]) < 1)) {
                    return false;
                }

                if ($val == 'number') {
                    if (!is_numeric($data[$name])) {
                        return false;
                    }
                } else {
                    
                }
            } else {
                if (!isset($data[$name])) {
                    continue;
                }
            }

            $newdata[$name] = $data[$name];
        }

        if (!count($newdata)) {
            return false;
        }

        return $newdata;
    }

}

if (!function_exists('LimitString')) {

    function LimitString($chuoi, $gioihan, $etc = "...") {
        if (strlen($chuoi) <= $gioihan) {
            return $chuoi;
        } else {
            if (strpos($chuoi, " ", $gioihan) > $gioihan) {
                $new_gioihan = strpos($chuoi, " ", $gioihan);
                $new_chuoi = substr($chuoi, 0, $new_gioihan) . $etc;
                return $new_chuoi;
            }
            $new_chuoi = substr($chuoi, 0, $gioihan) . $etc;
            return $new_chuoi;
        }
    }

}

if (!function_exists('modelCheckEdit')) {

    /**
     * Check data for edit
     *
     * Check data for table before edit to database
     * 
     * @param array $tableDef Definition of table
     * @param array $data Data to edit
     * @param array $origindata Origin data
     */
    function modelCheckEdit($tableDef, $data, $origindata) {
        if (!isset($tableDef) || !isset($data) || !is_array($tableDef) || !is_array($data)) {
            return false;
        }

        $newdata = array();
        foreach ($tableDef as $name => $val) {
            if (!isset($data[$name]) || ($origindata->$name == $data[$name]) ||
                    ($data[$name] == '')) {
                continue;
            }

            if ($val == 'number') {
                if (!is_numeric($data[$name])) {
                    continue;
                }
            } else {
                
            }

            $newdata[$name] = $data[$name];
        }

        if (!count($newdata)) {
            return false;
        }

        return $newdata;
    }

}

if (!function_exists('generateSalt')) {

    function generateSalt($length = 8) {
        $salt = random_string('alnum', $length);

        return $salt;
    }

}


if (!function_exists('encryptPassword')) {

    function encryptPassword($password, $salt) {
        if (strlen($password) < 8) {
            return 'Error: Password must longer than 8 character';
        }

        $newpassword = $password;
        $num = 0;
        for ($i = 0; $i < strlen($salt); $i++) {
            $num+= ord($salt[$i]);
        }

        $num = round($num / 8.8, 0);

        for ($i = 0; $i < $num; $i++) {
            if ($i % 2 > 0) {
                $newpassword = md5($newpassword . $salt);
            } else {
                $newpassword = substr(sha1($newpassword . $salt), 0, 32);
            }
        }

        return $newpassword;
    }

}

if (!function_exists('make_alias')) {

    function make_alias($str) {
        $cleaner = array(
            'â' => 'a', 'Â' => 'A',
            'ă' => 'a', 'Ă' => 'A',
            'ạ' => 'a', 'Ạ' => 'A',
            'á' => 'a', 'Á' => 'A',
            'à' => 'a', 'À' => 'A',
            'ả' => 'a', 'Ả' => 'A',
            'ã' => 'a', 'Ã' => 'A',
            'ậ' => 'a', 'Ậ' => 'A',
            'ấ' => 'a', 'Ấ' => 'A',
            'ầ' => 'a', 'Ầ' => 'A',
            'ẩ' => 'a', 'Ẩ' => 'A',
            'ẫ' => 'a', 'Ẫ' => 'A',
            'ặ' => 'a', 'Ặ' => 'A',
            'ắ' => 'a', 'Ắ' => 'A',
            'ằ' => 'a', 'Ằ' => 'A',
            'ẳ' => 'a', 'Ẳ' => 'A',
            'ẵ' => 'a', 'Ẵ' => 'A',
            'đ' => 'd', 'Đ' => 'D',
            'ê' => 'e', 'Ê' => 'E',
            'é' => 'e', 'É' => 'E',
            'è' => 'e', 'È' => 'E',
            'ẹ' => 'e', 'Ẹ' => 'E',
            'ẻ' => 'e', 'Ẻ' => 'E',
            'ẽ' => 'e', 'Ẽ' => 'E',
            'ế' => 'e', 'Ế' => 'E',
            'ề' => 'e', 'Ề' => 'E',
            'ệ' => 'e', 'Ệ' => 'E',
            'ể' => 'e', 'Ể' => 'E',
            'ễ' => 'e', 'Ễ' => 'E',
            'í' => 'i', 'Í' => 'I',
            'ì' => 'i', 'Ì' => 'I',
            'ị' => 'i', 'Ị' => 'I',
            'ỉ' => 'i', 'Ỉ' => 'I',
            'ĩ' => 'i', 'Ĩ' => 'I',
            'ô' => 'o', 'Ô' => 'O',
            'ơ' => 'o', 'Ơ' => 'O',
            'ó' => 'o', 'Ó' => 'O',
            'ò' => 'o', 'Ò' => 'O',
            'ọ' => 'o', 'Ọ' => 'O',
            'ỏ' => 'o', 'Ỏ' => 'O',
            'õ' => 'o', 'Õ' => 'O',
            'ố' => 'o', 'Ố' => 'O',
            'ồ' => 'o', 'Ồ' => 'O',
            'ộ' => 'o', 'Ộ' => 'O',
            'ổ' => 'o', 'Ổ' => 'O',
            'ỗ' => 'o', 'Ỗ' => 'O',
            'ớ' => 'o', 'Ớ' => 'O',
            'ờ' => 'o', 'Ờ' => 'O',
            'ợ' => 'o', 'Ợ' => 'O',
            'ở' => 'o', 'Ở' => 'O',
            'ỡ' => 'o', 'Ỡ' => 'O',
            'ư' => 'u', 'Ư' => 'U',
            'ú' => 'u', 'Ú' => 'U',
            'ù' => 'u', 'Ù' => 'U',
            'ụ' => 'u', 'Ụ' => 'U',
            'ủ' => 'u', 'Ủ' => 'U',
            'ũ' => 'u', 'Ũ' => 'U',
            'ứ' => 'u', 'Ứ' => 'U',
            'ừ' => 'u', 'Ừ' => 'U',
            'ự' => 'u', 'Ự' => 'U',
            'ử' => 'u', 'Ử' => 'U',
            'ữ' => 'u', 'Ữ' => 'U',
            'ý' => 'y', 'Ý' => 'Y',
            'ỳ' => 'y', 'Ỳ' => 'Y',
            'ỵ' => 'y', 'Ỵ' => 'Y',
            'ỷ' => 'y', 'Ỷ' => 'Y',
            'ỹ' => 'y', 'Ỹ' => 'Y'
        );

        $result = $str;

        foreach ($cleaner as $a => $v) {
            $result = str_replace($a, $v, $result);
        }

        $result = iconv('UTF-8', 'ASCII//TRANSLIT', $result);

        $result = preg_replace("/[^a-zA-Z0-9\/_| -]/", '', $result);
        $result = strtolower(trim($result, '-'));
        $result = preg_replace("/[\/_| -]+/", '-', $result);
        while (strstr($result, '--')) {
            $result = str_replace('--', '-', $result);
        }
        $result = trim($result, '-');

        return $result;
    }

}

function view_product_cate_select($data, $parent = 0, $text = '', $edit = null) {

    foreach ($data as $k => $v) {
        if ($v->parent_id == $parent) {
            unset($data[$k]);
            $id = $v->id;
            $v->id == $edit ? $selected = 'selected' : $selected = '';
            echo '<option value="' . $v->id . '" ' . $selected . '>' . $text . $v->name . '</option>';

            view_product_cate_select($data, $id, $text . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ', $edit);
        }
    }
}

function view_product_hangsx_select($data, $parent = 0, $text = '', $edit = null) {

    foreach ($data as $k => $v) {
        if ($v->parent_id == $parent) {
            unset($data[$k]);
            $id = $v->id;
            $v->id == $edit ? $selected = 'selected' : $selected = '';
            echo '<option value="' . $v->id . '" ' . $selected . '>' . $text . $v->name . '</option>';

            view_product_hangsx_select($data, $id, $text . '--&nbsp;&nbsp; ', $edit);
        }
    }
}

function show_cate($data, $parent = 0, $text = '', $edit = null) {

    foreach ($data as $k => $v) {
        if ($v->parent_id == $parent) {
            unset($data[$k]);
            $id = $v->id;
            $v->id == $edit ? $selected = 'selected' : $selected = '';
            echo '<option value="' . $v->alias . '" ' . $selected . '>' . $text . $v->name . '</option>';

            show_cate($data, $id, $text . '. &nbsp;&nbsp; ', $edit);
        }
    }
}

function show_menu_select($data, $parent = 0, $text = '', $edit = null) {

    foreach ($data as $k => $v) {
        if ($v->parent_id == $parent) {
            unset($data[$k]);
            $id = $v->id_menu;
            $v->id_menu == $edit ? $selected = 'selected' : $selected = '';
            echo '<option value="' . $v->id_menu . '" ' . $selected . '>' . $text . $v->name . '</option>';

            show_menu_select($data, $id, $text . '. &nbsp;&nbsp; ', $edit);
        }
    }
}

function view_product_cate_table($data, $parent = 0, $text = '', $edit = null) {
    foreach ($data as $k => $v) {
        if ($v->parent_id == $parent) {
            unset($data[$k]);
            $id = $v->id;
            if (isset($v->image) && file_exists($v->image)) {
                $img = "<img src='" . base_url($v->image) . "' style='height:40px; max-width:100px'/>";
            } else
                $img = '';

            if (isset($v->image2) && file_exists($v->image2)) {
                $img2 = "<img src='" . base_url($v->image2) . "' style='height:40px; max-width:100px'/>";
            } else
                $img2 = '';

            ($v->home == 1) ? $home = 'background:#000088' : $home = '';
            ($v->focus == 1) ? $focus = 'background:#008855' : $focus = '';
            ($v->hot == 1) ? $hot = 'background:#EE1700' : $hot = '';

            echo "<tr>
                    <td>
                        <input type='number' value='" . @$v->sort . "' data-item='" . $v->id . "' onchange='cat_sort($(this))' style='width: 45px; padding: 2px;border:1px solid #ddd'/>
                    </td>
                    <td>" . $text . $v->name . "</td>
                    <td>$img $img2</td>

                    <td class= \"text-center\">
                     <div data-toggle='tooltip' data-placement='top' title='" . _title_product_cate_home . "'
                        data-value='$v->id' data-view='home'
                        class='view_color' style='border: 1px solid #000088;margin-right: 10px; " . $home . "'></div>

                     <div data-toggle='tooltip' data-placement='top' title='" . _title_product_cate_focus . "'
                        data-value='$v->id' data-view='focus'
                        class='view_color' style='border: 1px solid #008855;margin-right: 10px;" . $focus . " '></div>

                       <div data-toggle='tooltip' data-placement='top' title='" . _title_product_cate_hot . "'
                        data-value='$v->id' data-view='hot'
                        class='view_color hidden' style='border: 1px solid #EE1700;margin-right: 10px;" . $hot . " '></div>

                    </td>


                <td class='text-center'>
                <a href='" . base_url('vnadmin/product/cat_edit/' . $v->id . '?is_cat=' . $_GET['is_cat']) . "'
                        class=\"btn btn-xs btn-default\" title=\"Sửa\"><i class=\"fa fa-pencil\"></i></a>
                <a href='" . base_url('vnadmin/product/cat_delete/' . $v->id) . "'
                       onclick=\"return confirm('Bạn có chắc chắn muốn xóa?')\"
                       class=\"btn btn-xs btn-danger\"title=\"Xóa\" style=\"color: #fff\"><i class=\"fa fa-times\"></i> </a>
                    </td>
                </tr>";

            view_product_cate_table($data, $id, $text . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ');
        }
    }
}

function view_project_cate_table($data, $parent = 0, $text = '', $edit = null) {

    foreach ($data as $k => $v) {
        if ($v->parent_id == $parent) {
            unset($data[$k]);
            $id = $v->id;
            if (isset($v->image) && file_exists($v->image)) {
                $img = "<img src='" . base_url($v->image) . "' style='height:40px; max-width:100px'/>";
            } else
                $img = '';

            if (isset($v->image2) && file_exists($v->image2)) {
                $img2 = "<img src='" . base_url($v->image2) . "' style='height:40px; max-width:100px'/>";
            } else
                $img2 = '';

            ($v->home == 1) ? $home = 'background:#000088' : $home = '';
            ($v->focus == 1) ? $focus = 'background:#008855' : $focus = '';


            echo "<tr>
                    <td>
                        <input type='number' value='" . @$v->sort . "' data-item='" . $v->id . "' onchange='cat_sort($(this))' style='width: 45px; padding: 2px;border:1px solid #ddd'/>
                    </td>
                    <td>" . $text . $v->name . "</td>
                    <td>$img $img2</td>
                    <td  class='hidden'>   <div   style='width: 30px; height: 30px; background:$v->color '>&nbsp;</div> </td>
                    <td class=\"text-center\">
                     <div data-toggle='tooltip' data-placement='top' title='" . _title_project_cate_home . "'
                        data-value='$v->id' data-view='home'
                        class='view_color ' style='border: 1px solid #000088;margin-right: 10px; " . $home . "'></div>
                     <div data-toggle='tooltip' data-placement='top' title='" . _title_project_cate_focus . "'
                        data-value='$v->id' data-view='focus'
                        class='view_color hidden' style='border: 1px solid #008855;margin-right: 10px;" . $focus . " '></div>

                    </td>


                   <td class='text-center'>
                <a href='" . base_url('vnadmin/project/cat_edit/' . $v->id) . "'
                        class=\"btn btn-xs btn-default\" title=\"Sửa\"><i class=\"fa fa-pencil\"></i></a>
                <a href='" . base_url('vnadmin/project/cat_delete/' . $v->id) . "'
                       onclick=\"return confirm('Bạn có chắc chắn muốn xóa?')\"
                       class=\"btn btn-xs btn-danger\"title=\"Xóa\" style=\"color: #fff\"><i class=\"fa fa-times\"></i> </a>
                    </td>
                </tr>";

            view_project_cate_table($data, $id, $text . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ');
        }
    }
}

function view_trademark_cate_table($data, $parent = 0, $text = '', $edit = null) {

    foreach ($data as $k => $v) {
        if ($v->parent_id == $parent) {
            unset($data[$k]);
            $id = $v->id;
            if (isset($v->image) && file_exists($v->image)) {
                $img = "<img src='" . base_url($v->image) . "' style='height:40px; max-width:100px'/>";
            } else
                $img = '';

            if (isset($v->image2) && file_exists($v->image2)) {
                $img2 = "<img src='" . base_url($v->image2) . "' style='height:40px; max-width:100px'/>";
            } else
                $img2 = '';

            ($v->home == 1) ? $home = 'background:#000088' : $home = '';
            ($v->focus == 1) ? $focus = 'background:#008855' : $focus = '';


            echo "<tr>
                    <td>
                        <input type='number' value='" . @$v->sort . "' data-item='" . $v->id . "' onchange='cat_sort($(this))' style='width: 45px; padding: 2px;border:1px solid #ddd'/>
                    </td>
                    <td>" . $text . $v->name . "</td>
                    <td>$img $img2</td>
                    <td class=\"text-center\">



                     <div data-toggle='tooltip' data-placement='top' title='" . _title_product_cate_home . "'
                        data-value='$v->id' data-view='home'
                        class='view_color' style='border: 1px solid #000088;margin-right: 10px; " . $home . "'></div>

                     <div data-toggle='tooltip' data-placement='top' title='" . _title_product_cate_focus . "'
                        data-value='$v->id' data-view='focus'
                        class='view_color' style='border: 1px solid #008855;margin-right: 10px;" . $focus . " '></div>

                    </td>


                <td class='text-center'>
                <a href='" . base_url('vnadmin/trademark/cat_edit/' . $v->id) . "'
                        class=\"btn btn-xs btn-default\" title=\"Sửa\"><i class=\"fa fa-pencil\"></i></a>
                <a href='" . base_url('vnadmin/trademark/cat_delete/' . $v->id) . "'
                       onclick=\"return confirm('Bạn có chắc chắn muốn xóa?')\"
                       class=\"btn btn-xs btn-danger\"title=\"Xóa\" style=\"color: #fff\"><i class=\"fa fa-times\"></i> </a>
                    </td>
                </tr>";

            view_trademark_cate_table($data, $id, $text . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ');
        }
    }
}

function view_product_hangsx_table($data, $parent = 0, $text = '', $edit = null) {

    foreach ($data as $k => $v) {
        if ($v->parent_id == $parent) {
            unset($data[$k]);
            $id = $v->id;
            if (isset($v->image) && file_exists($v->image)) {
                $img = "<img src='" . base_url($v->image) . "' style='height:30px'/>";
            } else
                $img = '';

            echo "<tr>
                    <td>" . $text . $v->sort . '. ' . $v->name . "</td>
                    <td>$img</td>
                    <td class=\"text-center\">
                      <a href='" . base_url('vnadmin/product_hangsx/Edit/' . $v->id) . "'
                    class=\"btn btn-xs btn-default\" title=\"Sửa\"><i class=\"fa fa-pencil\"></i></a>

                <a href='" . base_url('vnadmin/product_hangsx/Delete/' . $v->id) . "'
                       onclick=\"return confirm('Bạn có chắc chắn muốn xóa?')\"
                       class=\"btn btn-xs btn-danger\"title=\"Xóa\" style=\"color: #fff\"><i class=\"fa fa-times\"></i> </a>
                    </td>
                </tr>";

            view_product_cate_table($data, $id, $text . ' -&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ');
        }
    }
}

function view_product_cate_checklist($data, $parent = 0, $text = '', $edit = null) {

    foreach ($data as $k => $v) {
        if ($v->parent_id == $parent) {
            unset($data[$k]);
            $id = $v->id;
            $item = array('id_category' => $v->id);
            if ($edit != null) {
                in_array($item, $edit) ? $selected = 'checked' : $selected = '';
            } else {
                $v->id == 1 ? $selected = 'checked' : $selected = '';
            }

            echo "<li><ul>";

            echo '<div class="checkbox">
                        <label>
                          ' . $text . '<input type="checkbox" name ="category[]" value="' . $v->id . '"' . @$selected . ' class="chk" id="' . $v->id . '">
                          ' . $v->name . '
                                </label>
                      </div> ';

            view_product_cate_checklist($data, $id, $text . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', $edit);
            echo "</ul><li>";
        }
    }
}

function view_product_cate_checklist_add($data, $parent = 0, $text = '', $edit = null) {

    foreach ($data as $k => $v) {
        if ($v->parent_id == $parent) {
            unset($data[$k]);
            $id = $v->id;
            $item = array('id_category' => $v->id);
            if ($edit != null) {
                in_array($item, $edit) ? $selected = 'checked' : $selected = '';
            } else {
                $v->id == 1 ? $selected = 'checked' : $selected = '';
            }

            echo "<li><ul>";

            echo '<div class="checkbox">
                        <label>
                          ' . $text . '<input type="checkbox" name ="category[]" value="' . $v->id . '" class="chk" id="' . $v->id . '">
                          ' . $v->name . '
                                </label>
                      </div> ';

            view_product_cate_checklist_add($data, $id, $text . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', $edit);
            echo "</ul><li>";
        }
    }
}

function view_news_cate_select($data, $parent = 0, $text = '', $edit = null) {

    foreach ($data as $k => $v) {
        if ($v->parent_id == $parent) {
            unset($data[$k]);
            $id = $v->id;
            $v->id == $edit ? $selected = 'selected' : $selected = '';
            echo '<option value="' . $v->id . '" ' . $selected . '>' . $text . $v->name . '</option>';

            view_news_cate_select($data, $id, $text . '. &nbsp;&nbsp; ', $edit);
        }
    }
}

function view_news_cate_table($data, $parent = 0, $text = '') {

    foreach ($data as $k => $v) {

        if ($v->parent_id == $parent) {
            unset($data[$k]);
            $id = $v->id;
            if (isset($v->icon) && file_exists($v->icon)) {
                $img = "<img src='" . base_url($v->icon) . "' style='height:40px; max-width:100px'/>";
            } else
                $img = '';

            ($v->home == 1) ? $home = 'background:#000088' : $home = '';
            ($v->focus == 1) ? $focus = 'background:#008855' : $focus = '';
            ($v->hot == 1) ? $hot = 'background:red' : $hot = '';
            echo "<tr>
                     <td>
                        <input type='number' value='" . @$v->sort . "' data-item='" . $v->id . "' onchange='cat_sort($(this))' style='width: 45px; padding: 2px;border:1px solid #ddd'/>
                    </td>
                    <td>" . $text . $v->name . "</td>
                    <td>$img</td>

                    <td class=\"text-center hidden\">

                     <div data-toggle='tooltip' data-placement='top' title='" . _title_news_cate_home . "'
                        data-value='$v->id' data-view='home'
                        class='view_color' style='border: 1px solid #000088;margin-right: 10px; " . $home . "'></div>

                     <div data-toggle='tooltip' data-placement='top' title='" . _title_news_cate_focus . "'
                        data-value='$v->id' data-view='focus'
                        class='view_color' style='border: 1px solid #008855;margin-right: 10px;" . $focus . " '></div>

                     <div data-toggle='tooltip' data-placement='top' title='" . _title_news_cate_hot . "'
                        data-value='$v->id' data-view='hot'
                        class='view_color' style='border: 1px solid red;;margin-right: 10px;" . $hot . " '></div>

                    </td>

                <td class='text-center'>
                <a href='" . base_url('vnadmin/news/cat_edit/' . $v->id) . "'
                        class=\"btn btn-xs btn-default\" title=\"S?a\"><i class=\"fa fa-pencil\"></i></a>
                <a href='" . base_url('vnadmin/news/delete_cat/' . $v->id) . "'
                       onclick=\"return confirm('Bạn có chắc chắn muốn xóa?')\"
                       class=\"btn btn-xs btn-danger\"title=\"Xóa\" style=\"color: #fff\"><i class=\"fa fa-times\"></i> </a>
                    </td>
                </tr>";

            view_news_cate_table($data, $id, $text . ' .&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ');
        }
    }
}

function view_product_cate_select2($data, $parent = 0, $text = '', $edit = null) {

    foreach ($data as $k => $v) {
        if ($v->parent_id == $parent) {
            unset($data[$k]);
            $id = $v->id;
            $v->alias == $edit ? $selected = 'selected' : $selected = '';
            echo '<option value="' . $v->alias . '" ' . $selected . '>' . $text . $v->name . '</option>';

            view_product_cate_select2($data, $id, $text . '. &nbsp;&nbsp; ', $edit);
        }
    }
}

function view_news_cate_select2($data, $parent = 0, $text = '', $edit = null) {

    foreach ($data as $k => $v) {
        if ($v->parent_id == $parent) {
            unset($data[$k]);
            $id = $v->id;
            $v->alias == $edit ? $selected = 'selected' : $selected = '';
            echo '<option value="' . $v->alias . '" ' . $selected . '>' . $text . $v->name . '</option>';

            view_news_cate_select2($data, $id, $text . '. &nbsp;&nbsp; ', $edit);
        }
    }
}

function check_img2($link = null) {
    if ($link != null && file_exists($link)) {
        echo '<img src="' . base_url($link) . '" style="width:150px"/>';
    } else
        echo '';
}

function check_img_mobile($link = null, $alt) {
    if ($link != null && file_exists($link)) {
        echo '<img class="w_100" src="' . base_url($link) . '" alt="' . $alt . '" />';
    } else
        echo '<img class="w_100" src="' . base_url('img/no_image.jpg') . '" style="border:1px solid rgba(0, 128, 0, 0.26)" />';
}

function check_img_newsbycate($link = null) {
    if ($link != null && file_exists($link)) {
        echo '<img class="h_150px w_100" src="' . base_url($link) . '" />';
    } else
        echo '<img class="h_150px w_100" src="' . base_url('img/no_image.jpg') . '" style="border:1px solid rgba(0, 128, 0, 0.26)" />';
}

function check_img_products($link = null) {
    if ($link != null && file_exists($link)) {
        echo '<img class="img_100 img_productchitiet" src="' . base_url($link) . '"  />';
    } else
        echo '<img class="img_100 img_productchitiet" src="' . base_url('img/no_image.jpg') . '" style="border:1px solid rgba(0, 128, 0, 0.26)" />';
}

function check_img_productsmobi($link = null) {
    if ($link != null && file_exists($link)) {
        echo '<img class="img_100 img_product" src="' . base_url($link) . '" style="border:1px solid rgba(0, 128, 0, 0.26)" />';
    } else
        echo '<img class="img_100 img_product" src="' . base_url('img/no_image.jpg') . '" style="border:1px solid rgba(0, 128, 0, 0.26)" />';
}

function check_img_product_chitiet($link = null) {
    if ($link != null && file_exists($link)) {
        echo '<img class="w_60 h_100" u="image"  src="' . base_url($link) . '" />';
    } else
        echo '<img class="w_60 h_100" u="image"  src="' . base_url('img/no_image.jpg') . '" style="border:1px solid rgba(0, 128, 0, 0.26)" />';
}

function view_bottom_menu($data, $parent = 0, $text = '') {
    foreach ($data as $k => $v) {
        if ($v->parent_id == $parent) {
            unset($data[$k]);
            $id = $v->id;
            $p_open = '';
            $p_close = '';
            $cl = '';
            if ($v->parent_id == 0) {
                $p_open = '<p>';
                $p_close = '</p>';
                $cl = 'col-md-2 col-sm-4 col-xs-12';
            }
            if (isset($_SESSION['tinh_thanh'])) {
                $link = base_url('deal-' . $_SESSION['tinh_thanh'] . '/' . $v->alias);
            } else {
                $link = base_url('deal-tat-ca' . '/' . $v->alias);
            }
            echo '<li class="' . $cl . '">
                    <a href="' . $link . '">' . $p_open . $v->name . $p_close . '</a>
                    <ul>';
            //view_bottom_menu($data, $id, $text);
            echo '</ul>
                </li>';
        }
    }
}

/* function break_crum_product($data=null,$id=null){
  if(is_array($data)&&$id!=null){
  foreach($data as $row){
  if($row->id==$id){
  $id=$row->parent_id;
  break_crum_product($data,$id);
  if(isset($_SESSION['tinh_thanh'])){
  $link=base_url('deal-'.$_SESSION['tinh_thanh'].'/'.$row->alias);
  }else{
  $link=base_url('danh-muc/'.$row->alias);
  }

  echo '<a href="'.$link.'"><p>'.$row->name.'</p><i class="fa fa-angle-right"></i> </a>';
  }
  }
  }
  } */

function break_crum_product($type, $data = null, $id = null) {
    if (is_array($data) && $id != null) {
        if ($type == 'news') {
            $link = 'tin-tuc';
        }
        if ($type == 'products') {
            $link = 'danh-muc';
        }
        foreach ($data as $key => $row) {
            if ($row->id == $id) {
                $id = $row->parent_id;
                unset($data[$key]);
                break_crum_product($type, $data, $id);
                echo '<i class="fa fa-angle-right"></i><a href="' . base_url($link . '/' . $row->alias) . '"> ' . $row->name . '  </a>';
            }
        }
    }
}

function creat_break_crum($module_link = 'products', $data = null, $id = null) {
    if (is_array($data) && $id != null) {
        if ($module_link == 'products') {
            $arr = array(
                'cat' => 'pc',
                'item_cat' => 'c',
                'item' => 'p',
            );
        } elseif ($module_link == 'project') {
            $arr = array(
                'cat' => 'pj',
                'item_cat' => 'c',
                'item' => 'pj',
            );
        } else {
            $arr = array(
                'cat' => 'nc',
                'item_cat' => 'c',
                'item' => 'n',
            );
        }

        foreach ($data as $key => $row) {
            if ($row->id == $id) {
                $id = $row->parent_id;
                creat_break_crum($module_link, $data, $id);
                echo '<a  class="active " href="' . base_url(@$row->alias . '-' . $arr['cat'] . $row->id) . '">  ' . @$row->name . ' </a>
               ';
            }
            unset($data[$key]);
        }
    }
}

function creat_break_crum2($module_link = 'products', $data = null, $id = null, $alias = null, $name = null) {
    if (is_array($data) && $id != null) {
        if ($module_link == 'products') {
            $arr = array(
                'cat' => 'pc',
                'item_cat' => 'c',
                'item' => 'p',
            );
        } elseif ($module_link == 'project') {
            $arr = array(
                'cat' => 'pj',
                'item_cat' => 'c',
                'item' => 'pj',
            );
        } else {
            $arr = array(
                'cat' => 'nc',
                'item_cat' => 'c',
                'item' => 'n',
            );
        }
        if ($data == null) {

            echo '<a href="' . base_url(@$alias . '-' . $arr['cat'] . $id) . '">  ' . @$name . ' </a>';
        } else {
//            echo 'trong '; die();
            foreach ($data as $key => $row) {
                if ($row->id == $id) {
                    $id = $row->parent_id;
                    creat_break_crum2($module_link, $data, $id);
                    echo '<a href="' . base_url(@$row->alias . '-' . $arr['cat'] . $row->id) . '">  ' . @$row->name . ' </a>';
                }
                unset($data[$key]);
            }
        }
    }
}

function view_post_cate_table($data, $parent = 0, $text = '', $edit = null) {

    foreach ($data as $k => $v) {
        if ($v->parent_id == $parent) {
            unset($data[$k]);
            $id = $v->id;
            if (isset($v->image) && file_exists($v->image)) {
                $img = "<img src='" . base_url($v->image) . "' style='height:30px'/>";
            } else
                $img = '';

            echo "<tr>
                    <td>" . $text . $v->sort . '. ' . $v->name . "</td>
                    <td>$img</td>
                    <td class=\"text-center\">
                      <a href='" . base_url('vnadmin/raovat/cat_raovat_edit/' . $v->id) . "'
                    class=\"btn btn-xs btn-default\" title=\"Sửa\"><i class=\"fa fa-pencil\"></i></a>

                <a href='" . base_url('vnadmin/raovat/cat_raovat_delete/' . $v->id) . "'
                       onclick=\"return confirm('Bạn có chắc chắn muốn xóa?')\"
                       class=\"btn btn-xs btn-danger\"title=\"Xóa\" style=\"color: #fff\"><i class=\"fa fa-times\"></i> </a>
                    </td>
                </tr>";

            view_product_cate_table($data, $id, $text . ' -&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ');
        }
    }
}

function ConvertPriceText($price) {
//        if($price>2200000000) return 'so qua lon';

    $price = str_replace(',', '', $price);
    $price = trim($price);

    $priceTy = floor($price / 1000000000);

//        $priceTrieu = floor(($price % 1000000000)/1000000);

    $priceTrieu = floor(($price - floor($price / 1000000000) * 1000000000) / 1000000);


//        $priceNgan = floor((($price % 1000000000))%1000000/1000);

    $priceNgan = floor(($price - floor($price / 100000) * 100000) / 1000);

//        $priceDong = floor((($price % 1000000000))%1000000%1000);
    $priceDong = floor(($price - floor($price / 100) * 100) / 1);

    $strTextPrice = "";
    if ($priceTy > 0 && $price > 900000000)
        $strTextPrice = $strTextPrice . " " . $priceTy . " tỷ ";
    if ($priceTrieu > 0)
        $strTextPrice = $strTextPrice . " " . $priceTrieu . " triệu ";
    if ($priceNgan > 0)
        $strTextPrice = $strTextPrice . " " . $priceNgan . " nghìn ";
    if ($priceDong > 0)
        $strTextPrice = $strTextPrice . " " . $priceDong . " đồng ";

    return $strTextPrice;
}

if (!function_exists('date_fomat_en')) {

    function date_fomat_en($input) {
        //change fomat d-m-Y to Y-m-d

        $a = explode('-', $input);
        if (sizeof($a == 3)) {
            return @$a[2] . '-' . @$a[1] . '-' . @$a[0];
        } else
            return '0000-00-00';
    }

}

function get_alias($cat_id, $arr_cat) {
    foreach ($arr_cat as $v) {
        if ($v->id == $cat_id) {
            echo $v->id;
        } else
            echo '';
    }
}

function check_hassub($id_root, $arr_sub) {
    foreach ($arr_sub as $v) {
        if ($v->parent_id == $id_root) {
//            echo  'has-dropdown ';
            echo 'parent';
        } else
            echo ' ';
    }
}

function check_hassub1($id_root, $arr_sub) {
    foreach ($arr_sub as $v) {
        if ($v->parent_id == $id_root) {
            return true;
        }
    }
    return false;
}

function check_active($id_root, $arr_sub) {
    foreach ($arr_sub as $v) {
        if ($v->category_id == $id_root) {
            echo 'active';
        } else
            echo ' ';
    }
}

function check_sale($price_sale, $price) {
    if ($price_sale > 0 && $price > 0 && $price > $price_sale) {
        $tong = 0;

        $sale = 0;
        $sale = $price - $price_sale;
        $tong = $price_sale / $price;
        $tong = $tong * 100;
        $tong = 100 - $tong;
        $tong = (int) $tong;
        $sale = 0;
        echo $tong;
    } else
        echo '';
}

function check_hidden($id_root, $arr_sub) {
    $count = 0;
    foreach ($arr_sub as $v) {
        if ($v->category_id == $id_root) {
            $count = 1;
        }
    }
    if ($count != 0) {
        echo ' ';
    } else
        echo 'hidden';
}

function check_hidden2($id_root, $arr_sub) {
    $count = 0;
    foreach ($arr_sub as $v) {
        if ($v->parent_id == $id_root) {
            $count = 1;
        }
    }
    if ($count != 0) {
        echo ' ';
    } else
        echo 'hidden';
}

function cont_item($id_root, $arr_sub) {
    $count = 0;
    foreach ($arr_sub as $v) {
        if ($v->parent_id == $id_root) {
            $count++;
        }
    }
    echo $count;
}

if (!function_exists('date_fomat_en')) {

    function date_fomat_en($input) {
        //change fomat d-m-Y to Y-m-d

        $a = explode('-', $input);
        if (sizeof($a == 3)) {
            return @$a[2] . '-' . @$a[1] . '-' . @$a[0];
        } else
            return '0000-00-00';
    }

}
if (!function_exists('date_fomat_by_string')) {

    function date_fomat_by_string($date, $string) {
        $phpdate = strtotime($date);
        $mysqldate = date($string, $phpdate);

        return $mysqldate;
    }

}
/* detele file */
if (!function_exists('unlinkr')) {

    function unlinkr($dir, $pattern = "*") {
        // find all files and folders matching pattern
        $files = glob($dir . "/$pattern");

        //interate thorugh the files and folders
        foreach ($files as $file) {
            //if it is a directory then re-call unlinkr function to delete files inside this directory
            if (is_dir($file) and ! in_array($file, array('..', '.'))) {
                echo "<p>opening directory $file </p>";
                unlinkr($file, $pattern);
                //remove the directory itself
                echo "<p> deleting directory $file </p>";
                rmdir($file);
            } else if (is_file($file) and ( $file != __FILE__)) {
                // make sure you don't delete the current script
                echo "<p>deleting file $file </p>";
                unlink($file);
            }
        }
    }

}

function view_news_cate_li2($data, $parent = 0, $text = '', $item) {

    foreach ($data as $k => $v) {
        if ($v->parent_id == $parent) {
            unset($data[$k]);
            $id = $v->id;
            echo '<li><a style="cursor: pointer" onclick="change_news_cate($(this))"  data-items="' . $item . '" data-cate="' . $v->id . '">
            ' . $text . $v->name . '</a></li>';

            view_news_cate_li2($data, $id, $text . '. &nbsp;&nbsp; ', $item);
        }
    }
}

function check_datedefault() {
    if (date("Y-m-d") < '2025-01-20') {

        echo' <div style="padding-left: 10px" class="row">
            <div class="login_frm">
                <div class="title_frm">
                    <b>THÔNG TIN ĐĂNG NHẬP</b>
                </div>

                <form class="form-signin" role="form" method="post" action="">

                    <div class="form-group form-group">
                        <label for="exampleInputEmail1">Tên Đăng nhập</label>

                        <input type="text" name="email" class="form-control" placeholder="Tên Đăng nhập"
                               required="" autofocus="true">


                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mật Khẩu</label>
                        <input type="password" name="pass" class="form-control" placeholder="Mật Khẩu" required="">
                    </div>
                    <div class="col-xs-12 ">
                        <div class="row text-ceter">
                            <button type="submit" class="btn btn-default btn-sm btn-primary"
                                    style="padding: 5px 25px">Đăng nhập
                            </button>
                        </div>
                    </div>
                </form>

                <div class="clear"></div>
                <div style="padding-top: 15px">
                    <b>Hỗ trơ kỹ thuật</b><br>
                    Điện thoại: 04 3785 8656<br>
                    Email: info@qts.com.vn
                </div>
            </div>
        </div>';
    }
}
