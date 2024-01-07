<!-- Navigation Toggle -->
<!-- <button type="button" class="text-gray-500 hover:text-gray-600" data-hs-overlay="#docs-sidebar" aria-controls="docs-sidebar" aria-label="Toggle navigation">
  <span class="sr-only">Toggle Navigation</span>
  <svg class="flex-shrink-0 w-4 h-4" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
  </svg>
</button> -->
<!-- End Navigation Toggle -->

<div id="docs-sidebar" class=" hs-overlay hs-overlay-open:translate-x-0 -translate-x-full transition-all duration-300 transform hidden fixed top-0 start-0 bottom-0 z-[60] w-40 bg-white border-e border-gray-200 pt-7 pb-10 overflow-y-auto lg:block lg:translate-x-0 lg:end-auto lg:bottom-0 [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-slate-700 dark:[&::-webkit-scrollbar-thumb]:bg-slate-500 dark:bg-gray-800 dark:border-gray-700 ">
  <div class="px-6">
    <a class="flex-none text-xl font-semibold dark:text-white" href="#" aria-label="Brand">Mini Market  </a>
    @if(Auth::user()->cabang_id == null)
    <p class="flex-none text-xl font-semibold dark:text-white" href="#" aria-label="Brand">dashboard Owner</p>
    @else
    <p class="flex-none text-xl font-semibold dark:text-white" href="#" aria-label="Brand">{{Auth::user()->cabang->nama_cabang}} </p>
    @endif
  </div>
  <nav class="hs-accordion-group p-6 w-full flex flex-col flex-wrap" data-hs-accordion-always-open>
    <ul class="space-y-1.5">

    @hasrole('owner|manajer|supervisor')
      <li class="hs-accordion" id="users-accordion">
        <div class="hidden space-x-8 sm:-my-px sm:flex">
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
            <svg style="margin-right: 10px;" fill="#000000" width="24px" height="24px" viewBox="0 0 1920 1920" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M833.935 1063.327c28.913 170.315 64.038 348.198 83.464 384.79 27.557 51.84 92.047 71.944 144 44.387 51.84-27.558 71.717-92.273 44.16-144.113-19.426-36.593-146.937-165.46-271.624-285.064Zm-43.821-196.405c61.553 56.923 370.899 344.81 415.285 428.612 56.696 106.842 15.811 239.887-91.144 296.697-32.64 17.28-67.765 25.411-102.325 25.411-78.72 0-154.955-42.353-194.371-116.555-44.386-83.802-109.102-501.346-121.638-584.245-3.501-23.717 8.245-47.21 29.365-58.277 21.346-11.294 47.096-8.02 64.828 8.357ZM960.045 281.99c529.355 0 960 430.757 960 960 0 77.139-8.922 153.148-26.654 225.882l-10.39 43.144h-524.386v-112.942h434.258c9.487-50.71 14.231-103.115 14.231-156.084 0-467.125-380.047-847.06-847.059-847.06-467.125 0-847.059 379.935-847.059 847.06 0 52.97 4.744 105.374 14.118 156.084h487.454v112.942H36.977l-10.39-43.144C8.966 1395.137.044 1319.128.044 1241.99c0-529.243 430.645-960 960-960Zm542.547 390.686 79.85 79.85-112.716 112.715-79.85-79.85 112.716-112.715Zm-1085.184 0L530.123 785.39l-79.85 79.85L337.56 752.524l79.849-79.85Zm599.063-201.363v159.473H903.529V471.312h112.942Z" fill-rule="evenodd"></path> </g></svg>
                {{ __('Dashboard') }}
            </x-nav-link>
        </div>
      </li>
    @endhasrole
    @hasrole('owner|manajer|supervisor')
      <li class="hs-accordion" id="users-accordion">
        <div class="hidden space-x-8 sm:-my-px sm:flex">
            <x-nav-link :href="route('kelola.transaksi')" :active="request()->routeIs('kelola.transaksi')">
            <svg fill="#000000" width="24px" height="24px" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" class="icon"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M668.6 320c0-4.4-3.6-8-8-8h-54.5c-3 0-5.8 1.7-7.1 4.4l-84.7 168.8H511l-84.7-168.8a8 8 0 0 0-7.1-4.4h-55.7c-1.3 0-2.6.3-3.8 1-3.9 2.1-5.3 7-3.2 10.8l103.9 191.6h-57c-4.4 0-8 3.6-8 8v27.1c0 4.4 3.6 8 8 8h76v39h-76c-4.4 0-8 3.6-8 8v27.1c0 4.4 3.6 8 8 8h76V704c0 4.4 3.6 8 8 8h49.9c4.4 0 8-3.6 8-8v-63.5h76.3c4.4 0 8-3.6 8-8v-27.1c0-4.4-3.6-8-8-8h-76.3v-39h76.3c4.4 0 8-3.6 8-8v-27.1c0-4.4-3.6-8-8-8H564l103.7-191.6c.5-1.1.9-2.4.9-3.7zM157.9 504.2a352.7 352.7 0 0 1 103.5-242.4c32.5-32.5 70.3-58.1 112.4-75.9 43.6-18.4 89.9-27.8 137.6-27.8 47.8 0 94.1 9.3 137.6 27.8 42.1 17.8 79.9 43.4 112.4 75.9 10 10 19.3 20.5 27.9 31.4l-50 39.1a8 8 0 0 0 3 14.1l156.8 38.3c5 1.2 9.9-2.6 9.9-7.7l.8-161.5c0-6.7-7.7-10.5-12.9-6.3l-47.8 37.4C770.7 146.3 648.6 82 511.5 82 277 82 86.3 270.1 82 503.8a8 8 0 0 0 8 8.2h60c4.3 0 7.8-3.5 7.9-7.8zM934 512h-60c-4.3 0-7.9 3.5-8 7.8a352.7 352.7 0 0 1-103.5 242.4 352.57 352.57 0 0 1-112.4 75.9c-43.6 18.4-89.9 27.8-137.6 27.8s-94.1-9.3-137.6-27.8a352.57 352.57 0 0 1-112.4-75.9c-10-10-19.3-20.5-27.9-31.4l49.9-39.1a8 8 0 0 0-3-14.1l-156.8-38.3c-5-1.2-9.9 2.6-9.9 7.7l-.8 161.7c0 6.7 7.7 10.5 12.9 6.3l47.8-37.4C253.3 877.7 375.4 942 512.5 942 747 942 937.7 753.9 942 520.2a8 8 0 0 0-8-8.2z"></path> </g></svg>
                {{ __('Kelola Transaksi') }}
            </x-nav-link>
        </div>
      </li>
    @endhasrole
    @hasrole('owner|manajer')
      <li class="hs-accordion" id="users-accordion">
        <div class="hidden space-x-8 sm:-my-px sm:flex">
            <x-nav-link :href="route('kelola.barang')" :active="request()->routeIs('kelola.barang')">
            <svg fill="#000000" width="24px" height="24px" viewBox="0 0 1000 1000" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M758 107q-12-4-148-10-129-5-227-5-43 0-83 16t-71 47q-45 45-82 107-9 13-2 26 4 8 12 15l144 113-154 80q-12 6-18 15-8 14-5 38 9 56 39 275 2 19 15 32 18 20 53 23l388 28q20 3 40-2 16-4 31-12 11-6 20-14l115-109q20-21 28-40 5-14 7-40 2-47 6-156l3-101q24-174-29-261-28-45-78-63zM529 638l-58 46-6 2q-6 3-11 0l-33 22 76 46q10 6 10 17t-9.5 16.5-19.5.5l-79-42-2 41h12q7 0 11 4t4 10-4 10.5-11 4.5h-12v18q0 8-6 14t-14 6-13.5-6-5.5-14v-18h-14q-6 0-10.5-4.5T329 801t4.5-10 10.5-4h14l-2-41-79 42q-7 4-14.5 2t-11.5-9-2-15 9-12l76-47-42-26-8 22-73-49 45-37q9-7 18.5-9.5t17.5 3 10 12.5-1 18l55 29 2-90q0-8 5.5-13.5t14-5.5 14 5.5T397 580l2 90 35-18q1-5 6-10l5-3 69-27q15-6 24-1 3 2 3 6 1 11-12 21zm133-110l-490-18 163-83 470 13z"></path></g></svg>
                {{ __('Kelola Barang') }}
            </x-nav-link>
        </div>
      </li>
    @endhasrole
      @hasrole('kasir|manajer|supervisor')
      <li class="hs-accordion" id="users-accordion">
        <div class="hidden space-x-8 sm:-my-px  sm:flex">
            <x-nav-link :href="route('kasir')" :active="request()->routeIs('kasir')">
            <svg style="margin-right: 10px;" fill="#000000" height="24" width="24" version="1.2" baseProfile="tiny" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 256 256" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path id="XMLID_11_" d="M57.9,41.9c11.3,0,20.5-9.2,20.5-20.5c0-11.3-9.2-20.5-20.5-20.5c-11.3,0-20.5,9.2-20.5,20.5 C37.4,32.7,46.6,41.9,57.9,41.9"></path> <path id="XMLID_10_" d="M203.4,41.6c11.5,0,20.8-9.3,20.8-20.8c0-11.5-9.3-20.8-20.8-20.8c-11.5,0-20.8,9.3-20.8,20.8 C182.6,32.3,191.9,41.6,203.4,41.6"></path> <path id="XMLID_7_" d="M50.3,158.5c-26.9,0-48.7,21.8-48.7,48.7c0,26.9,21.8,48.8,48.7,48.8c26.9,0,48.8-21.8,48.8-48.8 C99.1,180.3,77.2,158.5,50.3,158.5 M56.1,238.2v7.8H44.4v-7.8c-12.4-1.4-20.4-13.3-20.4-21h12.4c0,3.5,2.7,8.1,8,9.2v-14.6 c-2.7-0.5-4.2-0.9-7.1-1.7c-7.3-2-12.4-8.2-12.4-16.1c0-7.8,7.6-16.6,19.4-18.1v-7.3h11.7v7.3c12.5,1.6,20.1,10.8,20.1,20l-12.2,0 c0-4-3.4-7.7-8-8.1v13.7c3.4,0.7,3.4,0.7,6.5,1.5c11.6,3.2,14.2,10.7,14.2,17.1C76.8,229.8,69,236.5,56.1,238.2"></path> <path id="XMLID_4_" d="M44.4,199.3c-5.2-0.9-6.6-3.2-6.6-5.6c0-2.8,3.5-5.5,6.6-5.9V199.3z M56.2,226.3V214c5.1,0.7,8.4,3,8.4,6.1 C64.6,222.9,61.6,226.1,56.2,226.3"></path> <path id="XMLID_3_" d="M31.2,77.4h8.1l-9.3,34.7h56l-9.3-34.7h8.1l9.6,34.7h18L100.6,70c-3.1-10.2-13.2-21-26.4-21H41.5 c-13.2,0-23.3,10.8-26.4,21L3.6,112.1h18L31.2,77.4z"></path> <path id="XMLID_2_" d="M225.6,48.8c10.2,0,18.5,8.3,18.5,18.5l0,56.8H256v23.3l-24.1,0v96.4c0,6.7-5.5,12.2-12.3,12.2 c-6.7,0-12.2-5.5-12.2-12.2v-96.4h-7.8v96.4c0,6.7-5.5,12.2-12.2,12.2c-6.7,0-12.2-5.5-12.2-12.2v-96.4L1.6,147.4v-23.4h173.6V69.4 l-38.8,46c-8.2,9.4-22.7-2.4-14.5-12.4l40.2-48.4c2.6-2.6,4.9-5.8,14.5-5.8H225.6z"></path> </g></svg>
                {{ __('Transaksi') }}
            </x-nav-link>
        </div>
      </li>
      @endhasrole
      @hasrole('pegawai gudang|manajer')   
      <li class="hs-accordion" id="users-accordion">
        <div class="hidden space-x-8 sm:-my-px  sm:flex">
            <x-nav-link :href="route('gudang')" :active="request()->routeIs('gudang')">
            <svg  style="margin-right: 10px;" width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16 6.00008V4.2844C16 3.51587 16 3.13161 15.8387 2.88321C15.6976 2.66587 15.4776 2.5118 15.2252 2.45345C14.9366 2.38677 14.5755 2.51809 13.8532 2.78073L6.57982 5.4256C6.01064 5.63257 5.72605 5.73606 5.51615 5.91845C5.33073 6.07956 5.18772 6.28374 5.09968 6.51304C5 6.77264 5 7.07546 5 7.6811V12.0001M9 17.0001H15M9 13.5001H15M9 10.0001H15M8.2 21.0001H15.8C16.9201 21.0001 17.4802 21.0001 17.908 20.7821C18.2843 20.5903 18.5903 20.2844 18.782 19.9081C19 19.4802 19 18.9202 19 17.8001V9.20008C19 8.07997 19 7.51992 18.782 7.0921C18.5903 6.71577 18.2843 6.40981 17.908 6.21807C17.4802 6.00008 16.9201 6.00008 15.8 6.00008H8.2C7.0799 6.00008 6.51984 6.00008 6.09202 6.21807C5.71569 6.40981 5.40973 6.71577 5.21799 7.0921C5 7.51992 5 8.07997 5 9.20008V17.8001C5 18.9202 5 19.4802 5.21799 19.9081C5.40973 20.2844 5.71569 20.5903 6.09202 20.7821C6.51984 21.0001 7.07989 21.0001 8.2 21.0001Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
            
                {{ __('Barang') }}
            </x-nav-link>
        </div>
      </li>   
      @endhasrole
    </ul>
  </nav>
</div>