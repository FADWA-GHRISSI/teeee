@extends('layouts.admin')

@section('content')
    <!-- start page content -->
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="page-bar">
                    <div class="page-title-breadcrumb">
                        <div class=" pull-left">
                            <div class="page-title">Ajouter visite</div>
                        </div>
                        <ol class="breadcrumb page-breadcrumb pull-right">
                            <li>
                                <i class="fa fa-home"></i>&nbsp;
                                <a class="parent-item" href="{{route('home')}}">
                                    Accueil
                                </a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li class="parent-item ">
                                <a href="{{ route('projects.show',['project'=> $projet->id ]) }}">{{ $projet->nom }}</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li class="parent-item ">
                                <a href="{{ route('visites.index',['projet_id'=> $projet->id ]) }}">Visites</a>
                                    <i class="fa fa-angle-right"></i>
                            </li>
                            <li class="active">{{ $page ?? '' }}</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 mb-5 mt-2">
                        <div class="card-box">
                            <div class="card-head">
                                <header>Visite</header>
                            </div>
                            <div class="card-body" id="bar-parent2">
                                <form action="{{ route('visites.store', ['projet_id' => $projet->id]) }}" method="POST" class="form-horizontal">
                                    @csrf
                                    <input type="text" style="display: none" value="{{app('request')->input('appel_id')}}" name="appel_id_convert_visite">
                                    <input type="text" style="display: none" value="{{app('request')->input('lead_id')}}" name="lead_id_convert_visite">
                                    <div class="form-body row">
                                        <div class="col-md-6">
                                            <input  type="text" style="display:none"  id="projet_id" value=" {{$projet->id}}"  />
                                            <textarea  style="display: none" type="text"   id="cin_no_client_no_visite" name="cin_no_client_no_visite"></textarea>
                                            <textarea  style="display: none" type="text"   id="id_client" name="id_client"></textarea>

                                            <div class="form-group row  margin-top-20">
                                                <label class="control-label col-md-3">
                                                    CIN <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-6">
                                                    <!--input type="text" class="form-control  @error('cin') is-invalid @enderror" name="cin" id="cin" value="{{ old('cin') }}" /-->
                                                    <textarea style="height: 36px" class="form-control @error('cin') is-invalid @enderror"  name="cin" @if(app('request')->input('appel_id') || app('request')->input('lead_id'))id="cin_n" @else id="cin"@endif>{{ old('cin',app('request')->input('cin')) }}</textarea>

                                                    @error('cin')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                 </div>

                                            </div>

                                            <div class="form-group row  margin-top-20">
                                                <label class="control-label col-md-3">
                                                    Nom  <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-6">
                                                    <!--input type="text" class="form-control @error('nom') is-invalid @enderror"  name="nom"   /-->
                                                    <textarea style="height: 36px" class="form-control @error('nom') is-invalid @enderror"  name="nom" id="nom" >{{ old('nom',app('request')->input('nom')) }}</textarea>
                                                    @error('nom')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row  margin-top-20">
                                                <label class="control-label col-md-3">
                                                    Prénom <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-6">
                                                    <textarea style="height: 36px" class="form-control @error('prenom') is-invalid @enderror"  name="prenom" id="prenom" >{{ old('prenom',app('request')->input('prenom')) }}</textarea>

                                                    <!--input type="text" class="form-control @error('prenom') is-invalid @enderror"   name="prenom" value="{{ old('prenom') }}"  /-->
                                                    @error('prenom')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row  margin-top-20">
                                                <label class="control-label col-md-3">
                                                    Téléphone <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-6">
                                                    <textarea style="height: 36px" class=" class_telephone form-control @error('telephone') is-invalid @enderror" pattern="[0-9]{3}[0-9]{3}[0-9]{4}"  name="telephone" id="telephone" >{{ old('telephone',app('request')->input('telephone')) }}</textarea>


                                                    @error('telephone')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row  margin-top-20">
                                                <label class="control-label col-md-3">
                                                    Téléphone 2
                                                </label>
                                                <div class="col-md-6">
                                                    <textarea style="height: 36px" class="class_telephone form-control @error('telephone2') is-invalid @enderror" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" name="telephone2" id="telephone2"id="telephone2" >{{ old('telephone2',app('request')->input('telephone2')) }}</textarea>
                                                    @error('telephone2')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row  margin-top-20">
                                                <label class="control-label col-md-3">
                                                    Notifié
                                                </label>
                                                <div class="col-md-6">
                                                    <label  class="radio control-label col-md-4">
                                                        <input type="radio" name="notifie_radio" value="oui"  onclick="show_select()"/>OUI
                                                    </label>
                                                        <label  class="radio control-label col-md-4" >
                                                            <input type="radio" name="notifie_radio" value="non"  onclick="hide_select()" checked="checked" />NON
                                                        </label>
                                                </div>

                                            </div>
                                            <div style="display: none" id="select_notif_type">
                                            <div class="form-group row  margin-top-20">
                                                <label class="control-label col-md-3">
                                                    TYPE NOTIFICATION
                                                </label>
                                                <div class="col-md-6">
                                                    <select id="select_notif_type_id" class="form-control  select2 " name="notifie_type" onchange="afficherEmail(this);">
                                                        <option value="">Choisissez un type</option>
                                                        <option value="sms"  {{ old('notifie_type') == 'sms' ? 'selected' : '' }}>SMS</option>
                                                        <option value="whatsapp"{{ old('notifie_type') == 'whtsp' ? 'selected' : '' }}>WhatsApp</option>
                                                        <option value="appel"{{ old('notifie_type') == 'sms' ? 'selected' : '' }}>Appel</option>
                                                        <option  id="email_select" value="email" {{ old('notifie_type') == 'email' ? 'selected' : '' }}>Email</option>
                                                    </select>
                                                </div>

                                            </div>
                                            </div>
                                            <div id="div_email" style="display: none">
                                            <div class="form-group row  margin-top-20">
                                                <label class="control-label col-md-3">
                                                    Email
                                                </label>
                                                <div class="col-md-6">
                                                    <input type="email" id="txt_email" class="form-control " name="email" value="{{old('email')}}">

                                                </div>
                                            </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="control-label col-md-3">
                                                    Source <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-6">
                                                    <select id="source" class="form-control  select2  @error('source') is-invalid @enderror" name="source" onchange="afficherPartenaire();">
                                                        <option value="">Choisissez une source</option>
                                                        @foreach($sources as $source)
                                                        <option value="{{$source->id}}" @if(old('source',app('request')->input('source_id'))==$source->id){{'selected'}}@endif>{{$source->source}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('source')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div id="partenaires" @if(app('request')->input('partenaire_id')!=null) style="display: block"@else style="display: none" @endif>
                                            <div class="form-group row" >
                                                <label class="control-label col-md-3">
                                                    Partenaire <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-6">
                                                    <select class="form-control  select2  @error('partenaire_id') is-invalid @enderror" name="partenaire_id" >
                                                        <option value="">Choisissez un partenaire</option>
                                                        @foreach($partenaires as $partenaire)
                                                        <option value="{{$partenaire->id}}" @if(old('partenaire_id',app('request')->input('partenaire_id'))==$partenaire->id){{'selected'}}@endif>{{$partenaire->nom}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('partenaire_id')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="control-label col-md-3">
                                                    Intérêt <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-6">
                                                    <select id="interet" class="form-control  select2  @error('interet') is-invalid @enderror" name="interet" onchange="resultInteret();" value="">
                                                        <option value="">Choisissez un intérêt</option>
                                                        <option value="réceptif"  @if(old('interet')=='réceptif'){{'selected'}}@endif>Réceptif</option>
                                                        <option value="intéréssé" @if(old('interet')=='intéréssé'){{'selected'}}@endif>Intéréssé</option>
                                                        <option value="perdu" @if(old('interet')=='perdu'){{'selected'}}@endif>Perdu</option>

                                                    </select>
                                                    @error('interet')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div id="frein_div" class="form-group row" style="display: none;">
                                                <label class="control-label col-md-3">
                                                    Frein <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-6">
                                                    <select id="frein" class="form-control  select2  @error('frein') is-invalid @enderror" name="frein" value="" onchange="resultFrein()">
                                                        <option value="">Choisissez un frein</option>
                                                        <option value="tranche" @if(old('frein')=='tranche'){{'selected'}}@endif>Tranche</option>
                                                        <option value="etage" @if(old('frein')=="etage"){{'selected'}}@endif>Etage</option>
                                                        <option value="avance" @if(old('frein')=="avance"){{'selected'}}@endif>Avance</option>
                                                        <option value="prix" @if(old('frein')=="prix"){{'selected'}}@endif>Prix</option>
                                                        <option value="superficie" @if(old('frein')=="superficie"){{'selected'}}@endif>Superficie</option>
                                                        <option value="prix_superficie" @if(old('frein')=="prix_superficie"){{'selected'}}@endif>Prix/Superficie</option>
                                                        <option value="emplacement" @if(old('frein')=="emplacement"){{'selected'}}@endif>Emplacement</option>
                                                        <option value="typologie" @if(old('frein')=="typologie"){{'selected'}}@endif>Typologie</option>
                                                        <option value="vue" @if(old('frein')=="vue"){{'selected'}}@endif>VUE</option>
                                                        <option value="ne_souhaite_plus_investir" @if(old('frein')=="ne_souhaite_plus_investir"){{'selected'}}@endif>Ne souhaite plus investir</option>

                                                    </select>
                                                    @error('frein')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div id="choix_bien" style="display: none;">
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">
                                                        Tranche  <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-6">
                                                        <select id="tranche_id" class="form-control  select2 select_tranche @error('tranche_id') is-invalid @enderror" name="tranche_id" onchange="getBlocs()" >
                                                            <option value="">Choisissez une tranche </option>
                                                            @foreach($tranches as $tranche)
                                                                <option value="{{$tranche->id}}"  @if(old('tranche_id')==$tranche->id){{'selected'}}@endif>{{$tranche->description}}</option>
                                                            @endforeach
                                                        <option id="new_tranche" value="new_tranche">Nouvelle Tranche</option>
                                                        </select>
                                                        @error('tranche_id')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div id="blocs_interesse" style="display: block">
                                                <div class="form-group row" >
                                                    <label class="control-label col-md-3">
                                                        Bloc <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-6">
                                                        <select     id="bloc_id" class="form-control  select2 select_bloc @error('bloc_id') is-invalid @enderror" name="bloc_id" onchange="getImmeubles()">
                                                            <option value=" {{old('bloc_id')}} ">Choisissez un bloc </option>
                                                        </select>
                                                        @error('bloc_id')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                </div>
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">
                                                        Immeuble <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-6">
                                                        <select id="immeuble_id" class="form-control  select2 select_immeuble @error('immeuble_id') is-invalid @enderror" name="immeuble_id" onchange="getBiensDispo()">
                                                            <option value="">Choisissez un immeuble </option>
                                                        </select>
                                                        @error('immeuble_id')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                </div>
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">
                                                        Biens <span class="required"> * </span>
                                                    </label>
                                                    <div class="col-md-6">
                                                        <input type="hidden" value={{Auth::user()->id}}   id='us_id'>
                                                        <textarea   id="ancien_id_bien" style="display: none"></textarea>
                                                        <select id='bien' class="form-control  select2 select_bien @error('bien_id') is-invalid @enderror" name="bien_id" >
                                                            <option  id="bien_selected" value=" {{ Session::get('bien_selected') }} ">Choisissez un bien </option>
                                                         
                                                        </select>
                                                        @error('bien_id')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                    <div class="form-group row">
                                                        <label class="control-label col-md-3">
                                                            Statut <span class="required"> * </span>
                                                        </label>
                                                        <div class="col-md-6">
                                                            <select id="statut" class="form-control  select2 @error('statut') is-invalid @enderror" name="statut" onchange="afficherInfosinter(this);">
                                                                <option value="">Choisissez un statut</option>
                                                                <option id="pre" @if( old('statut')=="pré-réservé" ){{'selected'}}@endif value="pré-réservé">Pré-réservé</option>
                                                                <option id="vendu" @if( old('statut')=="vendu" ){{'selected'}}@endif value="vendu">Vendu</option>

                                                            </select>
                                                            @error('statut')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="div_new_tranche" style="display: none">
                                                    <div class="form-group row">
                                                        <label class="control-label col-md-3">
                                                            Nouvelle Tranche  <span class="required"> * </span>
                                                        </label>
                                                        <div class="col-md-6">
                                                            <select id="tranche_id_new" class="form-control  select2 select_tranche @error('new_tranche_id') is-invalid @enderror" name="new_tranche_id"  >
                                                                <option value="">Choisissez une nouvelle  tranche </option>
                                                            </select>
                                                            @error('new_tranche_id')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                                <div  id="rdv_div" >
                                                <div class="form-group row  margin-top-20">
                                                    <label class="control-label col-md-3">
                                                            RDV
                                                    </label>
                                                    <div class="col-md-6">
                                                        <input id="rdv" type="datetime-local" class="form-control" name="rdv"
                                                               value="{{ old('rdv') }}" />

                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                             <div id="date_relance_div" style="display: none;">

                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">
                                                        Mode de relance
                                                    </label>
                                                    <div class="col-md-6">
                                                        <select id="mode_relance" class="form-control  select2 " name="mode_relance">
                                                            <option    value="">Choisissez un mode</option>
                                                            <option @if( old('mode_relance')=="Appel" ){{'selected'}} @endif value="Appel">Appel</option>
                                                            <option  @if( old('mode_relance')=="Sms" ){{'selected'}} @endif value="Sms">Sms</option>
                                                            <option value="Email" @if( old('mode_relance')=="Email" ){{'selected'}} @endif>Email</option>

                                                        </select>

                                                    </div>
                                                </div>
                                                 <div class="form-group row  margin-top-20">
                                                    <label class="control-label col-md-3">
                                                        Date de relance
                                                    </label>
                                                    <div class="col-md-6">
                                                        <input id="date_relance" type="date" class="form-control" name="prochaine_relance"  value="{{old('prochaine_relance')}}"/>

                                                    </div>
                                                </div>
                                            </div>


                                            <div id="resultat_frein"  style="display: none;">
                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">
                                                        Tranche
                                                    </label>
                                                    <div class="col-md-6">
                                                        <select id="frein_tranche_id" class="form-control  select2 select_gender" name="frein_tranche_id" >
                                                            <option value="">Choisissez une tranche</option>
                                                            @foreach($tranches as $tranche)
                                                            <option value="{{$tranche->id}}">{{$tranche->description}}</option>
                                                            @endforeach
                                                        </select>

                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="control-label col-md-3">
                                                        Etage
                                                    </label>
                                                    <div class="col-md-6">
                                                        <select id="frein_niveau" class="form-control  select2 select_gender" name="frein_niveau"  >

                                                           @for( $i = 0;$i<=$nb_max_etage;$i++)
                                                                <option value="{{$i}}">{{$i}}</option>
                                                            @endfor

                                                        </select>

                                                    </div>
                                                </div>


                                                    <div class="form-group row">
                                                        <label class="control-label col-md-3">
                                                            ORIENTATION
                                                        </label>
                                                        <div class="col-md-6">
                                                            <select id="frein_orientation" class="form-control  select2 select_gender" name="frein_orientation">
                                                                <option value="">Choisissez une orientation</option>
                                                                <option value="N" {{ old('frein_orientation') == 'N' ? 'selected' : '' }}>N</option>
                                                                <option value="E" {{ old('frein_orientation') == 'E' ? 'selected' : '' }}>E</option>
                                                                <option value="S" {{ old('frein_orientation') == 'S' ? 'selected' : '' }}>S</option>
                                                                <option value="O" {{ old('frein_orientation') == 'O' ? 'selected' : '' }}>O</option>
                                                                <option value="N/E" {{ old('frein_orientation') == 'N/E' ? 'selected' : '' }}>N/E</option>
                                                                <option value="N/O" {{ old('frein_orientation') == 'N/O' ? 'selected' : '' }}>N/O</option>
                                                                <option value="N/S" {{ old('frein_orientation') == 'N/S' ? 'selected' : '' }}>N/S</option>
                                                                <option value="O/E" {{ old('frein_orientation') == 'O/E' ? 'selected' : '' }}>O/E</option>
                                                                <option value="O/S" {{ old('frein_orientation') == 'O/S' ? 'selected' : '' }}>O/S</option>
                                                                <option value="E/S" {{ old('frein_orientation') == 'E/S' ? 'selected' : '' }}>E/S</option>
                                                                <option value="">Choisissez une typologie</option>
                                                            </select>

                                                        </div>

                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="control-label col-md-3">
                                                            typologie
                                                        </label>
                                                        <div class="col-md-6">
                                                            <select id="frein_typologie" class="form-control  select2 select_gender" name="frein_typologie">
                                                                <option value="">Choisissez une typologie</option>
                                                                <option value="A" {{ old('typologie') == 'A' ? 'selected' : '' }}>A</option>
                                                                <option value="B" {{ old('typologie') == 'E' ? 'selected' : '' }}>B</option>
                                                                <option value="C" {{ old('typologie') == 'C' ? 'selected' : '' }}>C</option>
                                                                <option value="D" {{ old('typologie') == 'D' ? 'selected' : '' }}>D</option>
                                                                <option value="E" {{ old('typologie') == 'E' ? 'selected' : '' }}>E</option>

                                                            </select>

                                                        </div>

                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="control-label col-md-3">
                                                            VUE
                                                        </label>
                                                        <div class="col-md-6">
                                                            <select id="frein_vue" class="form-control  select2 select_gender" name="frein_vue">
                                                                <option value="">Choisissez une vue</option>
                                                                <option value="piscine" {{ old('vue') == 'piscine' ? 'selected' : '' }}>PISCINE</option>
                                                                <option value="vue mer" {{ old('vue') == 'vue mer' ? 'selected' : '' }}>VUE MER</option>
                                                                <option value="Vue exterieur" {{ old('vue') == 'Vue exterieur' ? 'selected' : '' }}>VUE EXTERIEUR</option>
                                                            </select>

                                                        </div>

                                                    </div>
                                                    <div  class="form-group row  margin-top-20">
                                                        <label class="control-label col-md-3">
                                                            Avance
                                                        </label>
                                                        <div class="col-md-6">
                                                            <input id="frein_avance" type="number" class="form-control" name="frein_avance" value="{{old('frein_avance')}}" />

                                                        </div>
                                                    </div>
                                                    <div  class="form-group row  margin-top-20">
                                                        <label class="control-label col-md-3">
                                                            Prix
                                                        </label>

                                                        <div class="col-md-6 row">
                                                            <label class="control-label col-md-2">
                                                                min
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input id="prix_min" type="number" class="form-control" name="frein_prix_min" value="{{old('prix_min')}}" />
                                                            </div>
                                                            <label class="control-label col-md-2">
                                                                max
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input id="prix_max" type="number" class="form-control" name="frein_prix_max" value="{{old('prix_max')}}"  />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div  class="form-group row  margin-top-20">
                                                        <label class="control-label col-md-3">
                                                            Superficie
                                                        </label>
                                                        <div class="col-md-6 row">
                                                            <label class="control-label col-md-2">
                                                                min
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input id="superficie_min" type="number" class="form-control" name="frein_superficie_min" value="{{old('superficie_min')}}"  />
                                                            </div>
                                                            <label class="control-label col-md-2">
                                                                max
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input id="superficie_max" type="number" class="form-control" name="frein_superficie_max" value="{{old('superficie_max')}}" />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row  margin-top-20">
                                                        <label class="control-label col-md-3">
                                                            Liste d'attente
                                                        </label>
                                                        <div class="col-md-6">
                                                            <label  class="radio control-label col-md-4">
                                                                <input type="radio" name="is_waiting" value="1">OUI
                                                            </label>
                                                                <label  class="radio control-label col-md-4" >
                                                                    <input type="radio" name="is_waiting" value="0"   checked="checked" />NON
                                                                </label>
                                                        </div>

                                                    </div>

                                                </div>




                                                <div  class="form-group row  margin-top-20">
                                                    <label class="control-label col-md-3">
                                                        Commentaire
                                                    </label>
                                                    <div class="col-md-6">
                                                        <textarea class="form-control" name="commentaire">{{old('commentaire')}}</textarea>
                                                    </div>
                                                </div>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="offset-md-4 col-md-9">
                                            <button type="submit"  id="btn_submit" class="btn btn-info">Enregistrer</button>
                                            <a href="{{ route('visites.index', ['projet_id'=>$projet->id]) }}" class="btn btn-default">Annuler</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="card mb-0">
                        <div class="m-b-20">
                            <div class="doctor-profile">


                                <h2 style="color:#595959; text-align: center;font-weight: 600;" >Ce client  à déja une visite sur ce projet</h2>
                                <!--a href="{{ url('projets/'.$projet->id.'/visites') }}" id="lien">Consulter</a-->
                                 <a href="" id="lien">Consulter la visite</a>
                                <div class="profile-userbuttons">
                                    <button type="button" class="btn btn-circle deepPink-bgcolor btn-sm" data-dismiss="modal">
                                        Fermer
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="card mb-0">
                        <div class="m-b-20">
                            <div class="doctor-profile">

                                <h2 style="color:#595959; text-align: center;font-weight: 600;" >Ce client  existe  déja</h2>
                                <div class="profile-userbuttons">
                                    <button type="button" class="btn btn-circle deepPink-bgcolor btn-sm" data-dismiss="modal">
                                        Fermer
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModalInfo" tabindex="-1" aria-labelledby="typecongeLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header pt-0">
                    <h5 class="modal-title" id="typecongeLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="border-left: 1px solid #efefef;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5 class="text-center my-3">
                        <b style="color:red; text-align: center;font-weight: 600; font-size: 20px;">Attention</b>
                    </h5>
                    <hr>
                    <div class="card-body">
                        <h2 style="color:#595959; text-align: center;font-weight: 600;" >Il est Important d'Annuler le Compromis de Vente du Bien <h2 style="margin-top: 2px;font-weight: bold;color: blue;text-align: center" id="nom_bien"></h2> </h2>
                    </div>
                </div>

            </div>
        </div>
    </div>
      <div class="modal fade" id="myModalCinTel" tabindex="-1" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="min-width:700px;">
                <div class="modal-header pt-0">
                    <h5 class="modal-title" id="" >Information </h5>
                </div>
                <div class="modal-body">
                    <div class="card-body">

                        <h2  id="client" style="color:red; text-align: center;font-weight: 400;"></h2>
                        <h2  id="cin_tel_client" style="color:#595959; text-align: center;font-weight: 400;"></h2>
                        <h2  id="cin_tel_lead" style="color:#595959; text-align: center;font-weight: 400;"></h2>
                        <a href="#" id="cin_tel_Appel"
                                style="color: #595959;
                                text-align: center;
                                font-weight: 400;
                                font-size: 30px;
                                margin-left: 167px;">
                        </a>
                        <h2 class="col-md-10" id="cin_tel_Visite" style="color:#595959; text-align: center;font-weight: 400;"></h2>

                        <div class="form-group row " >
                            <a   style="margin-left: 45%" type="button" class="btn btn-circle deepPink-bgcolor btn-sm"  id="href_valider"  data-toggle="modal"  data-dismiss="modal">
                                Fermer
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end page content -->
@endsection
@section('javascript')
    <script>


        $('.class_telephone').keyup(delay(function (e) {
            console.log('Time elapsed! after 900ms');
               var token="{{Session::token()}}";
               var telephone,telephone2;

               var tel= document.getElementById('telephone').value;
               var tel2= document.getElementById('telephone2').value;
              // console.log(tel == '');
               if(tel == ''){
                   telephone=0;
               }
               else{
                   telephone=document.getElementById('telephone').value;
               }
               if(tel2 == ''){
                   telephone2=0;
               }
               else{
                   telephone2=document.getElementById('telephone2').value;
               }

               var nom=' ';
               var prenom=' ';
            $.ajax({

                type : 'get',
                dataType: "json",
                url: '{{Config::get('global_variable.path')}}/getInfo_appel_visite',
               data: {telephone:telephone,telephone2:telephone2,_token:token},
               success:function(data){

                    if( data.Appel_tel_in_client.length>0 || data.Appel_tel.length>0||data.lead_tel.length>0 ){

                       for (var i = 0; i< data.Appel_tel_in_client.length; i++) {
                            if(data.Appel_tel_in_client[i].nom!=null){
                                nom=data.Appel_tel_in_client[i].nom;
                            }
                            else{
                                nom=' ';
                            }
                            if(data.Appel_tel_in_client[i].prenom!=null){
                                prenom=data.Appel_tel_in_client[i].prenom;
                            }

                            else{
                                prenom=' ';
                            }
                            $('#client').html( 'Le Client : '+nom+ ' '+prenom);
                        }

                        for (var i = 0; i< data.Appel_tel.length; i++) {
                            if(data.Appel_tel[i].nom!=null){
                                nom=data.Appel_tel[i].nom;
                            }
                            else{
                                nom=' ';
                            }
                            if(data.Appel_tel[i].prenom!=null){
                                prenom=data.Appel_tel[i].prenom;
                            }

                            else{
                                prenom=' ';
                            }
                            $('#client').html( 'Le Client: '+nom+ ' '+prenom);
                        }
                        for (var i = 0; i< data.lead_tel.length; i++) {
                            if(data.lead_tel[i].nom!=null){
                                nom=data.lead_tel[i].nom;
                            }
                            else{
                                nom=' ';
                            }
                            if(data.lead_tel[i].prenom!=null){
                                prenom=data.lead_tel[i].prenom;
                            }

                            else{
                                prenom=' ';
                            }
                            $('#client').html( 'Le Client: '+nom+ ' '+prenom);
                        }

                    }




                    if(data.Appel_tel_in_client.length>0){
                        for (var i = 0; i< data.Appel_tel_in_client.length; i++) {
                            $('#cin_tel_client').html( " Est un client");
                            $('#cin').val(data.Appel_tel_in_client[i].cin);
                            $('#nom').val(data.Appel_tel_in_client[i].nom);
                            $('#prenom').val(data.Appel_tel_in_client[i].prenom);
                            $('#telephone').val(data.Appel_tel_in_client[i].telephone);
                            $('#telephone2').val(data.Appel_tel_in_client[i].telephone2);
                            $('#ville').val(data.Appel_tel_in_client[i].ville);
                        }
                    }

                    if(data.Appel_tel.length>0){
                        for (var i = 0; i< data.Appel_tel.length; i++) {
                            $('a#cin_tel_Appel').text('A déja fait un Appel');
                            $("#cin_tel_Appel").attr("href", function(i, href) {
                                return '' ;
                            });
                            $("#cin_tel_Appel").attr("href", function(i, href) {
                                return '{{Config::get('global_variable.path')}}/Appels/Numero/'+telephone+'/'+telephone2;
                            });
                            $("#cin_tel_Appel").attr('target','_blank');
                            $('#cin').val(data.Appel_tel[i].cin);
                            $('#nom').val(data.Appel_tel[i].nom);
                            $('#prenom').val(data.Appel_tel[i].prenom);
                            $('#telephone').val(data.Appel_tel[i].telephone);
                            $('#telephone2').val(data.Appel_tel[i].telephone2);
                            $('#ville').val(data.Appel_tel[i].ville);
                        }
                    }
                    if(data.lead_tel.length>0){
                        for (var i = 0; i< data.lead_tel.length; i++) {
                           $('#cin_tel_lead').html( " EST UN LEAD");
                            $('#nom').val(data.lead_tel[i].nom);
                            $('#prenom').val(data.lead_tel[i].prenom);
                            $('#telephone').val(data.lead_tel[i].telephone);
                        }
                    }
                    if(
                        data.Appel_tel_in_client.length>0 || data.Appel_tel.length>0  || data.lead_tel.length>0 ){

                    $('#myModalCinTel').modal('show');
                    }

                }
            });
        }, 900));


         function show_select(){
            $('#select_notif_type').show();
        }
        function hide_select(){
            $("#select_notif_type_id").val($("#select_notif_type_id option:first").val()).change();
            $('#select_notif_type').hide();
        }
        function afficherEmail(val)
        {

            if(val){
                email_value = document.getElementById("email_select").value;
                if(email_value == val.value){
                    document.getElementById("div_email").style.display = "block";
                }
                else{
                    $('#txt_email').val(' ')
                    document.getElementById("div_email").style.display = "none";
                }
            }
            else{
                $('#txt_email').val(' ')
                document.getElementById("div_email").style.display = "none";
            }
        }

       /* $('#bien').on('change', function () {
            var bien_id = this.selectedOptions[0].value;
            $.ajax({

                type: 'GET',
                url: '{{Config::get('global_variable.path')}}/getPrixByBienId',
                data: {bien_id:bien_id},
                dataType: 'JSON',
                success: function(data){
                    console.log(data);
                    if(data.compromis!=0){
                        $("#nom_bien").html(data.nom_bien );
                        $("#btn_submit").prop("disabled", true);
                        $('#myModalInfo').modal('show');
                    }
                    else {
                        $("#nom_bien").html(' ');
                        $("#btn_submit").prop("disabled", false);
                        $('#myModalInfo').modal('hide');
                    }


                }

            });
        });*/
        var previous_id;
        var prev_id;
//  this is function to  update id  0 to 1 Or riverse 
        $('#bien').focus(function () {
            // Store the current value on focus, before it changes
            previous_id = this.value;
            
        }).change(function() {

            $('#ancien_id_bien').html(previous_id)
            prev_id=previous_id
            previous_id = this.value;
            var bien_id = this.selectedOptions[0].value;
            $.ajax({
                type: 'GET',
                url: '{{Config::get('global_variable.path')}}/getPrixByBienId',
                data: {bien_id:bien_id,prev_id:prev_id},
                dataType: 'JSON',
                success: function(data){
                    console.log(data);
                    // if(data.compromis!=0){
                    //     $("#nom_bien").html(data.nom_bien );
                    //     $("#btn_submit").prop("disabled", true);
                    //     $('#myModalInfo').modal('show');
                    // }
                    // else {
                    //     $("#nom_bien").html(' ');
                    //     $("#btn_submit").prop("disabled", false);
                    //     $('#myModalInfo').modal('hide');
                    // }




                }

            });



        });
        function afficherInfosinter(statut)
        {
            console.log(statut);
            if(statut){
                inter_value = document.getElementById("vendu").value;
                if(inter_value == statut.value){

                    document.getElementById('date_relance_div').style.display = "none";
                    document.getElementById('rdv_div').style.display = "none";
                    $('#rdv').val('');
                    $("#mode_relance").val('').change();
                    document.getElementById('date_relance').value = "";
                }
                else{
                    document.getElementById('date_relance_div').style.display = "block";
                    document.getElementById('rdv_div').style.display = "block";
                    //Date de relance=t+24h
                    var newdate = new Date();
                    newdate.setDate(newdate.getDate() + 1 );

                    var dd1 = newdate.getDate();
                    var mm1 = newdate.getMonth()+ 1 ;
                    var y1 = newdate.getFullYear();
                    if(dd1<10){
                        dd1='0'+dd1;
                    }
                    if(mm1<10){
                        mm1='0'+mm1;
                    }
                    var someFormattedDate = dd1 + '/' + mm1 + '/' + y1;
                    var  today2 = y1+'-'+mm1+'-'+dd1;
                    console.log('date_relance: '+someFormattedDate);
                    document.getElementById('date_relance').value = today2;
                }
            }
            else{
                document.getElementById("infosMariage").style.display = "none";
            }
        }

        $('.select2').select2({
            theme: "bootstrap",

        });
        $( document ).ready(function() {
            $('.select2-container--bootstrap').css('width', '100%');

            if ($('#source').val()==14) {
                console.log('true');
                $("#partenaires").show();

            }
            if ($('#frein').val()=='tranche'||$('#frein').val()=='etage'||$('#frein').val()=='prix'||$('#frein').val()=='avance'||$('#frein').val()=='superficie'||$('#frein').val()=='prix_superficie'||$('#frein').val()=='emplacement'||$('#frein').val()=='typologie'||$('#frein').val()=='vue') {
                $("#resultat_frein").show();
            }

            if ($('#interet').val()=='perdu') {
                $("#frein_div").show();

            }

            if ($('#interet').val()=='réceptif') {
                $("#date_relance_div").show();

                var newdate = new Date();
                newdate.setDate(newdate.getDate() + 7 );

                var dd1 = newdate.getDate();
                var mm1 = newdate.getMonth()+ 1 ;
                var y1 = newdate.getFullYear();
                if(mm1<10){
                    mm1='0'+mm1;
                }
                var someFormattedDate = dd1 + '/' + mm1 + '/' + y1;
                var  today2 = y1+'-'+mm1+'-'+dd1;
                console.log('date_relance: '+someFormattedDate);
                document.getElementById('date_relance').value = today2;


            }
            if($('#interet').val()=='intéréssé') {
                $("#choix_bien").show();
                $("#rdv_div").show();
                $("#date_relance_div").show();

            }

        });

        function afficherPartenaire()
        {   $("#partenaires").hide();
            $('.select2-container--bootstrap').css('width', '100%');
            var source= document.getElementById("source").value;
            console.log(source);
            if(source==14){
                $("#partenaires").show();

            }
            else{
                $("#partenaires").hide();
            }


        }
        function resultInteret(){

            $('.select2-container--bootstrap').css('width', '100%');
            $("#choix_bien").hide();
            $("#date_relance_div").hide();
            $("#rdv_div").hide();
            $("#frein_div").hide();
            $("#resultat_frein").hide();
            $("#mode_relance").val('').change();
            $('#date_relance').val('');
            $('#rdv').val('');
            $('#tranche_id').val('');
            $('#bien').val('');
            $('#statut').val('');
            $('#frein_tranche_id').val('');
            //26-11$('#frein_niveau').val('');
            $('#frein_orientation').val('');
            $('#frein_typologie').val('');
            $('#frein_vue').val('');
            $('#frein_avance').val('');
            $('#prix_min').val('');
            $('#prix_max').val('');
            $('#superficie_min').val('');
            $('#superficie_max').val('');


            $('#frein').empty();
            $('#frein').append("<option value=''>Choisissez un frein</option>"+
                                "<option value='tranche' @if(old('frein')=='tranche'){{'selected'}}@endif>Tranche</option>"+
                                "<option value='etage' @if(old('frein')=='etage'){{'selected'}}@endif>Etage</option>"+
                                "<option value='avance' @if(old('frein')=='avance'){{'selected'}}@endif>Avance</option>"+
                                "<option value='prix' @if(old('frein')=='prix'){{'selected'}}@endif>Prix</option>"+
                                "<option value='superficie' @if(old('frein')=='superficie'){{'selected'}}@endif>Superficie</option>"+
                                "<option value='prix_superficie' @if(old('frein')=='prix_superficie'){{'selected'}}@endif>Prix/Superficie</option>"+
                                "<option value='emplacement' @if(old('frein')=='emplacement'){{'selected'}}@endif>Emplacement</option>"+
                                "<option value='typologie' @if(old('frein')=='typologie'){{'selected'}}@endif>typologie</option>"+
                                "<option value='vue' @if(old('frein')=='vue'){{'selected'}}@endif>VUE</option>"+
                                "<option value='ne_souhaite_plus_investir' @if(old('frein')=='ne_souhaite_plus_investir'){{'selected'}}@endif>Ne souhaite plus investir</option>");


            var interet=document.getElementById('interet').value;
            console.log('valeur interet: '+interet);

            if(interet == 'perdu'){
                $("#frein_div").show();
                $('#rdv').val('');
                $('#date_relance').val('');
                $("#mode_relance").val('').change();
            }
            else if(interet=='réceptif'){

                $("#date_relance_div").show();
                var newdate = new Date();
                newdate.setDate(newdate.getDate() + 7 );

                var dd1 = newdate.getDate();
                var mm1 = newdate.getMonth()+ 1 ;
                var y1 = newdate.getFullYear();
                if(dd1<10){
                    dd1='0'+dd1;
                }
                if(mm1<10){
                     mm1='0'+mm1;
                }
                var someFormattedDate = dd1 + '/' + mm1 + '/' + y1;
                var  today2 = y1+'-'+mm1+'-'+dd1;
                console.log('date_relance: '+someFormattedDate);
                document.getElementById('date_relance').value = today2;

            }

            else if(interet=='intéréssé'){
                    $("#choix_bien").show();
                    $("#date_relance_div").show();
                    $("#rdv_div").show();


            }



            else{
                document.getElementById("frein_div").style.display = "none";
                document.getElementById("choix_bien").style.display = "none";
                document.getElementById("date_relance_div").style.display = "none";
            }

        }


        function resultFrein(){
            console.log('result frein');
            var frein=document.getElementById("frein").value;
            if (frein=='tranche' || frein=='etage' || frein=='prix' || frein=='avance' || frein=='superficie' || frein=='prix_superficie' || frein=='emplacement'  || frein=='typologie' || frein=='vue') {
                $('#resultat_frein').show();
                $("#frein_tranche_id").val('Choisissez une tranche').change();
                //26-11
                //$('#frein_niveau').empty();
                //hadi
                //26-11 ('#frein_niveau').append('<option></option>');
                $("#frein_orientation").val('Choisissez une orientation').change();
                $("#frein_typologie").val('Choisissez une typologie').change();
                $("#frein_vue").val('Choisissez une vue').change();
                $('#frein_avance').val('');
                $('#prix_min').val('');
                $('#prix_max').val('');
                $('#superficie_min').val('');
                $('#superficie_max').val('');

            }
            else{
                $('#resultat_frein').hide();
                $("#frein_tranche_id").val('Choisissez une tranche').change();
              //26-11  $("#frein_niveau").val('Choisissez un étage').change();
                $("#frein_orientation").val('Choisissez une orientation').change();
                $("#frein_typologie").val('Choisissez une typologie').change();
                $("#frein_vue").val('Choisissez une vue').change();
                $('#frein_avance').val('');
                $('#prix_min').val('');
                $('#prix_max').val('');
                $('#superficie_min').val('');
                $('#superficie_max').val('');

            }


        }



        function getBlocs(){

            var token="{{Session::token()}}";
            var tranche_id = document.getElementById('tranche_id').value;
            var prj_id= document.getElementById('projet_id').value;
           // var lastValue = $('#tranche_id option:last-child').val();
            console.log("tranche_id: "+tranche_id);
        if(tranche_id=="new_tranche"){
            var theSelect = document.getElementById('tranche_id');
            var lastValue = theSelect.options[theSelect.options.length - 2].value;
            console.log("last value 9bal new tranche   " +lastValue)
            document.getElementById("blocs_interesse").style.display = "none";
            document.getElementById("div_new_tranche").style.display = "block";
            $.ajax({
                type: 'get',
                url: '{{Config::get('global_variable.path')}}/getNewTranches',
                data: {id_tranche: lastValue, _token: token},
                dataType: 'JSON',
                success: function (data) {
                    console.log("new tranche : " + data);
                    $('#tranche_id_new').empty();
                    $('#tranche_id_new').append('<option></option>');
                    for (var i =data+1; i <= 20; i++) {
                        if (i <= 9) {
                            $('#tranche_id_new').append('<option value=' +'T0'+i + '>' + 'T0'+i + '</option>')
                        }
                        else if (i > 9) {
                            $('#tranche_id_new').append('<option value='+ 'T'+i + '>' + 'T'+i + '</option>')
                        }

                    }
                }
            });
        }
        else {
            document.getElementById("blocs_interesse").style.display = "block";
            document.getElementById("div_new_tranche").style.display = "none";
            $.ajax({
                type: 'POST',
                url: '{{Config::get('global_variable.path')}}/biens/getBlocsByTrancheId',
                data: {tranche_id: tranche_id, _token: token},
                dataType: 'JSON',
                success: function (data) {
                    console.log("blocs: " + data);
                    $('#bloc_id').empty();
                    $('#bloc_id').append('<option></option>');
                    for (var i = 0; i < data.length; i++) {
                        $('#bloc_id').append('<option value=' + data[i].id + '>' + data[i].description + '</option>')
                    }
                }
            });
          }
        }
        function getImmeubles(){
            var token="{{Session::token()}}";
            var bloc_id = document.getElementById('bloc_id').value;
            $.ajax({
                type: 'POST',
                url: '{{Config::get('global_variable.path')}}/biens/getImmeublesByBlocId',
                data: {bloc_id: bloc_id, _token: token},
                dataType: 'JSON',
                success: function (data) {
                    $('#immeuble_id').empty();
                    $('#immeuble_id').append('<option></option>');
                    for (var i = 0; i < data.length; i++) {
                        $('#immeuble_id').append('<option value=' + data[i].id + '>' + data[i].description + '</option>')
                    }
                }
            });
        }
        

        //  function  fetch from  function getbiensDispo

        //like to see below
        function getBiensDispo(){

            var token="{{Session::token()}}"
            var us_id = document.getElementById('us_id').value;
            var immeuble_id = document.getElementById('immeuble_id').value;



       fetch();
       function fetch() {
        selectedOption = $("#bien").val();
         $.ajaxSetup({
               headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
         });


            $.ajax({
                //'+(data[i].proposition ==1 ? disabled=true: '')+'
                type: 'POST',
                url: '{{Config::get('global_variable.path')}}/biens/getBiensDispoByImmeubleId',
                data: {immeuble_id: immeuble_id, _token: token},
                dataType: 'JSON',
                success: function (data) {
                    console.log("biens=>"+data)
                    $('#bien').empty();
                    $('#bien').append('<option></option>');
                    
                    for (var i = 0; i < data.length; i++) {
                        if(data[i].proposition ==1 && data[i].user_id_propose != us_id  ){
                            $('#bien').append('<option disabled=true value='+data[i].id+'>'+data[i].propriete_dite_bien+'EN COURS DE PROPOSITION '+'</option>')
                        }
                        else{
                            $('#bien').append('<option value='+data[i].id+'>'+data[i].propriete_dite_bien+'</option>')

                        }



                    }
                    // var bienSelected = $('#bien_selected').val();
                    // // $('#bien_selected').val(bienSelected);

                    // console.log("bien_selected: =>" + bienSelected);
                    // $('#bien').val(session::('bien_selected')
                    // $('#bien').val('<?php echo session("bien_selected"); ?>');
                    console.log("select =>"+selectedOption);
                    $("#bien").val(selectedOption);

            //  this to get session from the section above 
            
                  
                }

            });
        }

        // this is  function auto refresh 
        setInterval(fetch, 5000);  // 30000 meanS 30 second
        
       

    }
    





    $(document).ready(function () {

        function fetch() {
    $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
    $.ajax({
        type: "Post",
        url:  '{{Config::get('global_variable.path')}}/biens/getBiensDispoByImmeubleId',
        dataType: "json",
        success: function (response) {
            // console.log(response.banq);
            $('#body').html("");
                    $.each(response.banq, function (key, info) {
                        $('#body').append('<tr>\
                            <td>' + info.id + '</td>\
                            <td>' + info.nom_banque + '</td>\
                            <td><button type="button" value="' + info.id + '" class="btn btn-primary editbtn btn-sm">Edit</button></td>\
                            <td><button type="button" value="' + info.id + '" class="btn btn-danger deletebtn btn-sm">Delete</button></td>\
                        \</tr>');
                    });
           
        }
    });
    
}
    });











//26-11

        var placeholder1 = "Choisissez un bloc";
        $('.select_bloc').select2({
            theme: "bootstrap",
            placeholder: placeholder1,
        });
        var placeholder2 = "Choisissez un immeuble";
        $('.select_immeuble').select2({
            theme: "bootstrap",
            placeholder: placeholder2,
        });
        var placeholder = "Choisissez un bien";
        $('.select_bien').select2({
            theme: "bootstrap",
            placeholder: placeholder,
        });
        var placeholder = "Choisissez une tranche";
        $('.select_tranche').select2({
            theme: "bootstrap",
            placeholder: placeholder,
        });

        $('#cin').keyup(delay(function (e) {
            var value=$(this).val();
            console.log('Time elapsed! after ms', value);
            if(value!=''){
               var prj_id= document.getElementById('projet_id').value;
                $.ajax({
                    type : 'get',
                    url: '{{Config::get('global_variable.path')}}/searchVisitBycin',
                    data: {cin_search:value,project_id:prj_id},
                    success:function(data){
                        if(data.client_cin.length>0 && data.visites_cin_in_projet.length==0 && data.visites_cin_other_projet.length==0) {
                            $('#cin_no_client_no_visite').html("exist_client_table");
                            $('#myModal2').modal('show');
                            for (var i = 0; i< data.client_cin.length; i++) {
                                $('#id_client').html(data.client_cin[i].id);
                                $('#nom').html(data.client_cin[i].nom);
                                $('#prenom').html(data.client_cin[i].prenom);
                                $('#telephone').html(data.client_cin[i].telephone1);
                                $('#telephone2').html(data.client_cin[i].telephone2);
                            }
                        }

                        else if(data.client_cin.length>0 && data.visites_cin_in_projet.length>0 && data.visites_cin_other_projet.length==0) {

                            ('#cin_no_client_no_visite').empty;
                            $('#id_client').empty();
                            $("#id_client").prop('disabled', true);
                            $('#nom').empty()
                            $("#nom").prop('disabled', true);
                            $('#prenom').empty()
                            $("#prenom").prop('disabled', true);
                            $('#telephone').empty()
                            $("#telephone").prop('disabled', true);
                            $('#telephone2').empty()
                            $("#telephone2").prop('disabled', true);

                            $("#lien").attr("href", "");


                            $("#lien").attr("href", function(i, href) {

                                return href +'{{Config::get('global_variable.path')}}/projets/'+ data.visites_cin_in_projet[i].project_id+'/detail_visite/'+data.visites_cin_in_projet[i].id;
                            });

                                    $('#myModal').modal('show');
                                }
                        else if(data.client_cin.length==0 && data.visites_cin_in_projet.length>0 && data.visites_cin_other_projet.length==0) {

                            ('#cin_no_client_no_visite').empty;
                            $('#id_client').empty();
                            $("#id_client").prop('disabled', true);
                            $('#nom').empty()
                            $("#nom").prop('disabled', true);
                            $('#prenom').empty()
                            $("#prenom").prop('disabled', true);
                            $('#telephone').empty()
                            $("#telephone").prop('disabled', true);
                            $('#telephone2').empty()
                            $("#telephone2").prop('disabled', true);
                            $("#lien").attr("href", "");

                            $("#lien").attr("href", function(i, href) {
                                return href +'{{Config::get('global_variable.path')}}/projets/'+ data.visites_cin_in_projet[i].project_id+'/detail_visite/'+data.visites_cin_in_projet[i].id;
                            });
                            $('#myModal').modal('show');
                        }
                        else if(data.client_cin.length>0 && data.visites_cin_in_projet.length==0 && data.visites_cin_other_projet.length>0) {
                            $('#cin_no_client_no_visite').html("exist_client_table");

                            $('#myModal2').modal('show');
                            for (var i = 0; i< data.client_cin.length; i++) {
                                $('#id_client').html(data.client_cin[i].id);
                                console.log(data.client_cin[i].nom)
                                $('#nom').html(data.client_cin[i].nom);
                                $('#prenom').html(data.client_cin[i].prenom);
                                $('#telephone').html(data.client_cin[i].telephone1);
                                $('#telephone2').html(data.client_cin[i].telephone2);
                            }
                        }
                        else {
                           // console.log("walo")
                            $('#cin_no_client_no_visite').html("not_exist");
                            $('#id_client').empty();
                            $('#nom').empty()
                            $("#nom").prop('disabled', false);
                            $('#prenom').empty()
                            $("#prenom").prop('disabled', false);
                            $('#telephone').empty()
                            $("#telephone").prop('disabled', false);
                            $('#telephone2').empty()
                            $("#telephone2").prop('disabled', false);

                        }

                    }
                });
            }
        }, 500));
        function delay(callback, ms) {
            var timer = 0;
            return function() {
                var context = this, args = arguments;
                clearTimeout(timer);
                timer = setTimeout(function () {
                    callback.apply(context, args);
                }, ms || 0);
            };
        }




    </script>
@endsection
