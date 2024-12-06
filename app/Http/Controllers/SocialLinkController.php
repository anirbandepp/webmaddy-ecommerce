<?php

namespace App\Http\Controllers;

use App\Models\SocialLink;
use Illuminate\Http\Request;

class SocialLinkController extends Controller
{
    public function index()
    {
        $socialLink = SocialLink::first();

        return view('admin.pages.socialLinks.create')->with([
            'socialLink' => $socialLink
        ]);
    }

    public function storeLinks(Request $r)
    {
        $this->validate($r, [
            'facebook' => 'required|url',
            'twitter' => 'required|url',
            'linkedin' => 'required|url',
            'instagram' => 'required|url',
            'youtube' => 'required|url'
        ]);

        $socialLink = SocialLink::first();

        if (isset($socialLink)) {
            $socialLink->facebook = $r->facebook;
            $socialLink->twitter = $r->twitter;
            $socialLink->linkedin = $r->linkedin;
            $socialLink->instagram = $r->instagram;
            $socialLink->youtube = $r->youtube;
            $socialLink->update();
        } else {
            SocialLink::create([
                'facebook' => $r->facebook,
                'twitter' => $r->twitter,
                'linkedin' => $r->linkedin,
                'instagram' => $r->instagram,
                'youtube' => $r->youtube,
            ]);
        }

        $r->session()->flash('success', 'social link created successfully..');
        return redirect()->route('administrator.social_link.social_link_list');
    }
}
