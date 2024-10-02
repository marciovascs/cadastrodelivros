{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<x-backpack::menu-item title="Autores" icon="la la-question" :link="backpack_url('autor')" />

<x-backpack::menu-item title="Assuntos" icon="la la-question" :link="backpack_url('assunto')" />
<x-backpack::menu-item title="Livros" icon="la la-question" :link="backpack_url('livro')" />

<x-backpack::menu-item title="Relatório Autor" icon="la la-question" :link="backpack_url('relatorio-autor')" />
