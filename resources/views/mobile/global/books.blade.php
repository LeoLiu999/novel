@forelse( $books  as $book)
	<a href="{{ route('m_book', ['idcode' => $book->id]) }}">
          <li class="media mb-3">
                <img class="mr-3 book-cover rounded" src="/storage{{ $book->cover }}" alt="{{ $book->name }}">
                <div class="media-body">
                  <h5 class="mt-0 mb-1 text-dark ">{{ $book->name }}</h5>
                  <p class="book-desc">{{ $book->description }}</p>
                  <p><small class="float-left text-969">{{ $book->author }}</small><small class="float-right text-969">{{ $book->category }}</small></p>
                </div>
          </li>
     </a>
  @empty
      
  @endforelse
