<x-app>
  <header class="mb-6 relative">
    <div class="relative">

      <img 
        src="/images/default-profile-banner.jpg" 
        alt=""
        class="mb-2"
      >

      <img 
        src="{{ $user->avatar }}" 
        alt=""
        class="rounded-full mr-2 absolute transform -translate-x-1/2 translate-y-1/2"
        style="left: 50%;bottom: 0;"
        width= "150"
      >

    </div>

    <div class="flex justify-between items-center mb-0">
      <div>
        <h2 class="font-bold text-2xl mb-0"> {{ $user->name }}</h2>
        <p class="text-sm">Joined {{ $user->created_at->diffForHumans() }}</p>
      </div>

      <div class="flex">
        <a 
          href="" 
          class="rounded-full border border-gray-300 py-2 px-2 text-black text-xs mr-2"
          >
            Edit profie
          </a>

          <x-follow-button :user="$user"></x-follow-button>

      </div>

    </div>

    
    <p class="text-sm mt-4">
      Tom and Jerry is an American animated franchise and series of comedy short films created in 1940 by William Hanna and Joseph Barbera. 
      Best known for its 161 theatrical short films by Metro-Goldwyn-Mayer, the series centers on a friendship/rivalry (a love-hate relationship) 
      between the title characters Tom, a cat, and Jerry, a mouse. Many shorts also feature several recurring characters.
    </p>

  </header>

  @include ('_timeline', [
      'tweets'=> $user->tweets
  ])
    
</x-app>