<?php

namespace App\Constants;

class CategoryIcons
{
    public const ICONS = [
        'user' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.809,18.9067 C3.137,18.9067 0,18.3517 0,16.1277 C0,13.9037 3.117,11.8997 6.809,11.8997 C10.481,11.8997 13.617,13.8847 13.617,16.1077 C13.617,18.3307 10.501,18.9067 6.809,18.9067 Z" fill="currentColor"/><circle cx="6.8" cy="7" r="4" fill="currentColor"/></svg>',
        'book' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="2" y="2" width="10" height="5" fill="currentColor"/><path d="M10,20 L15,25" stroke="currentColor"/></svg>',
        'about' => '<svg width="24" height="24" class="line" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <g transform="translate(2.749500, 2.549500)">
                                        <path d="M6.809,18.9067 C3.137,18.9067 9.41469125e-14,18.3517 9.41469125e-14,16.1277 C9.41469125e-14,13.9037 3.117,11.8997 6.809,11.8997 C10.481,11.8997 13.617,13.8847 13.617,16.1077 C13.617,18.3307 10.501,18.9067 6.809,18.9067 Z">
                                        </path>
                                        <path d="M6.809,8.728 C9.219,8.728 11.173,6.774 11.173,4.364 C11.173,1.954 9.219,-2.48689958e-14 6.809,-2.48689958e-14 C4.399,-2.48689958e-14 2.44496883,1.954 2.44496883,4.364 C2.436,6.766 4.377,8.72 6.778,8.728 L6.809,8.728 Z">
                                        </path>
                                        <path d="M14.0517,7.5293 C15.4547,7.1543 16.4887007,5.8753 16.4887007,4.3533 C16.4897,2.7653 15.3627,1.4393 13.8647,1.1323">
                                        </path>
                                        <path d="M14.7113,11.104 C16.6993,11.104 18.3973,12.452 18.3973,13.655 C18.3973,14.364 17.8123,15.092 16.9223,15.301">
                                        </path>
                                    </g>
                                </svg>'
        // Thêm các icon khác ở đây
    ];

    public static function all()
    {
        return self::ICONS;
    }
} 