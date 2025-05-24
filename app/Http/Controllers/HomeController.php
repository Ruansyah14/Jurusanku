<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $topPTN = [
            [
                'name' => 'Universitas Indonesia (UI)',
                'description' => 'Universitas tertua dan terbesar di Indonesia dengan berbagai program studi unggulan.',
                'image' => 'ui.png',
            ],
            [
                'name' => 'Institut Teknologi Bandung (ITB)',
                'description' => 'Kampus teknik terkemuka dengan reputasi internasional di bidang sains dan teknologi.',
                'image' => 'itb.png',
            ],
            [
                'name' => 'Universitas Gadjah Mada (UGM)',
                'description' => 'Universitas negeri di Yogyakarta yang terkenal dengan program studi sosial dan humaniora.',
                'image' => 'ugm.png',
            ],
            [
                'name' => 'Institut Pertanian Bogor (IPB)',
                'description' => 'Kampus unggulan di bidang pertanian dan ilmu lingkungan.',
                'image' => 'ipb.png',
            ],
            [
                'name' => 'Universitas Airlangga (UNAIR)',
                'description' => 'Universitas di Surabaya yang fokus pada kesehatan dan ilmu sosial.',
                'image' => 'unair.png',
            ],
            [
                'name' => 'Universitas Diponegoro (UNDIP)',
                'description' => 'Universitas di Semarang dengan program studi teknik dan kesehatan.',
                'image' => 'undip.png',
            ],
            [
                'name' => 'Universitas Sebelas Maret (UNS)',
                'description' => 'Universitas di Solo yang berkembang pesat dengan berbagai program studi.',
                'image' => 'uns.png',
            ],
            [
                'name' => 'Universitas Brawijaya (UB)',
                'description' => 'Universitas di Malang yang dikenal dengan program studi pertanian dan teknik.',
                'image' => 'ub.png',
            ],
            [
                'name' => 'Universitas Hasanuddin (UNHAS)',
                'description' => 'Universitas di Makassar dengan program studi kesehatan dan teknik.',
                'image' => 'unhas.png',
            ],
            [
                'name' => 'Universitas Padjadjaran (UNPAD)',
                'description' => 'Universitas di Bandung yang memiliki program studi kedokteran dan sosial.',
                'image' => 'unpad.png',
            ],
        ];

        return view('home_pijar', compact('user', 'topPTN'));
    }
}
