<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Bookmark;
use App\Models\Tickets;


class BookmarkController extends Controller
{
    public function save(Tickets $ticket)
    {
        $bookmark = Bookmark::firstOrCreate([
            'user_id' => Auth::id(),
            'item_list_id' => $ticket->id,
        ]);

        return response()->json([
            'success' => true,
            'bookmarked' => true,
            'message' => 'Ticket Bookmarked!',
        ]);
    }

    public function destroy(Tickets $ticket)
    {
        $bookmark = Bookmark::where('user_id', Auth::id())->where('ticket_id', $ticket->id)->first();

        if ($bookmark) {
            $bookmark->delete();
            return response()->json([
                'success' => true,
                'bookmarked' => false,
                'message' => 'Deleted from Bookmark!',
            ]);
        }

        return response()->json([
            'success' => false,
            'bookmarked' => false,
            'message' => 'Error: Bookmark not found.',
        ]);
    }

    public function bookmarked()    // edit $data sama viewnya
    {
        $data = [
            'category_name' => 'posts',
            'page_name' => 'bookmarks',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];
        
        // $posts = ItemList::paginate(6);
        $bookmarks = Auth::user()->bookmarkedPosts()->get();
        return view('posts.bookmarked', compact('bookmarks'))->with($data);
    }
}
