import { Component } from '@angular/core';
import { ProduitService } from '../produit.service';
import { initFlowbite } from 'flowbite';
import { response } from '../data/dataProduitParDefaut';
import { FormArray, FormControl } from '@angular/forms';
import { FormBuilder, FormGroup } from '@angular/forms';

@Component({
  selector: 'app-produit',
  templateUrl: './produit.component.html',
  styleUrls: ['./produit.component.css']
})
export class ProduitComponent {

  produit: any = response
  listProd: FormGroup
  modal: FormGroup
  inputFooter: FormGroup
  modal2: FormGroup
  mntRendu: number = 0
  mntGeneral: number = 0
  // mntApayer: number = 0 

  constructor(private prodService: ProduitService, private fb: FormBuilder) {
    this.listProd = this.fb.group({
      utilisateur_id: [1],
      client_id: [1],
      produit_id: [],
      succursale_id: [1],
      montantPay:[],
      mntTotalCommande: [],
      
      prod_succurs: this.fb.array([])
    });
    this.modal = this.fb.group({
      prix: [],
      qte: []
    })
    this.inputFooter = this.fb.group({
      remise: [],
      montantTotal: []
    })
    this.modal2 = this.fb.group({
      mntEncaisse: [],
    })

  }

  title = 'web-app';

  ngOnInit(): void {
    initFlowbite();
  }
  get ProdValue() {
    return this.listProd.get('prod_succurs') as FormArray
  }
 
  store() {
    this.listProd.get('montantPay')?.setValue(this.modal2.get('mntEncaisse')?.value);
    this.listProd.get('mntTotalCommande')?.setValue(this.inputFooter.get('montantTotal')?.value)
    // console.log(this.listProd.value);
    const data=this.listProd.value;
    data.prod_succurs=this.ProdValue.value.map((element:any)=>{
      return {
        prix:element.prix,
        qte:element.qte,
      }
    })
    console.log(data);
    
  
  }

  createItem() {
    this.fb.group({
      prod: [],
      prix: [],
      qte: [],
      total: []
    })
  }
  validProd() {
    let prix = this.modal.value.prix
    let qte = this.modal.value.qte
    let total = prix * qte;
    let montantTotalActu = +total
    this.listProd.get('produit_id')?.setValue(this.produit.data.id)
    const data = {
      prod: this.produit.data.libelle,
      prix: prix,
      qte: qte,
      total: total,
    }
    let montantTotalAvant = this.inputFooter.value.montantTotal
    this.ProdValue.push(this.fb.group(data))
    this.inputFooter.get("montantTotal")?.setValue(montantTotalActu + montantTotalAvant)
    this.mntGeneral = montantTotalActu + montantTotalAvant
  }
  reductionMontant(event: Event) {
    const inputRedu = event.target as HTMLInputElement
    const mntTotal = this.inputFooter.get("montantTotal")?.value
    const reduc = +inputRedu.value;
    let montantReduct = (mntTotal * reduc) / 100;
    if (inputRedu.value) {
      this.inputFooter.get("montantTotal")?.setValue(mntTotal - montantReduct)
    }
  }
  validerCommande(event: Event) {
    const mntEncaisse = event.target as HTMLInputElement
    if (+mntEncaisse.value > this.mntGeneral) {
      this.mntRendu = +mntEncaisse.value - this.mntGeneral

    }

  }
  searchProd(event: Event) {
    const inputProd = event.target as HTMLInputElement;
    if (inputProd.value) {
      this.prodService.search(+inputProd.value, 1).subscribe((response) => {
        this.produit = response
        console.log(this.produit);
      })
    }

  }



}
