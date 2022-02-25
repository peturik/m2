
<div class="col-md-4">
    <div class="position-sticky" style="top: 2rem;">
        <div class="p-4 mb-3 bg-light rounded">
            <h4 class="fst-italic">About</h4>
            <p class="mb-0">Customize this section to tell your visitors a little bit about your publication, writers, content, or something else entirely. Totally up to you.</p>
        </div>
        {{-- @livewire('search')      --}}
        

        <div class="p-4">
            <h4 class="fst-italic">Categories</h4>
            <div class="list-unstyled">
                @include('layouts.part.categories')
            </div>
        </div>

        <div class="p-4">
            <h4 class="fst-italic">Elsewhere</h4>
            <ol class="list-unstyled">
                <li><a href="#">GitHub</a></li>
                <li><a href="#">Twitter</a></li>
                <li><a href="#">Facebook</a></li>
            </ol>
        </div>
    </div>
</div>
