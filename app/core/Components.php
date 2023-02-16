<?php

class Components
{
    public static function deleteButton($url)
    {
        return '<form action="' . BASEURL . $url . '" method="POST" class="d-inline">
                    <button class="btn btn-danger btn-circle btn-sm my-1" onclick="return confirm(`Anda yakin ingin menghapus?`)" type="submit">
                    <i class="fas fa-trash"></i>
                    </button>
                </form>';
    }
    public static function editButton($url)
    {
        return '<a href="' . BASEURL . $url . '" class="btn btn-warning btn-circle btn-sm my-1">
                    <i class="fas fa-pencil-alt"></i>
                </a>';
    }
    public static function headingPage($title, $url = false)
    {
        if ($url) {
            return '<h1 class="h3 mb-3 text-gray-600 font-weight-bold font-italic font-underlined">' . $title . '</h1>
             <a href="' . BASEURL . '/dashboard/' . $url . '" class="btn btn-success btn-icon-split mb-4">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah Data</span>
             </a>';
        } else {
            return '<h1 class="h3 mb-3 text-gray-600 font-weight-bold font-italic font-underlined">' . $title . '</h1>';
        }
    }
}
