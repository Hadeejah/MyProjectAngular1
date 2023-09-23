import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';


@Injectable({
  providedIn: 'root'
})
export class ProduitService {

  constructor(private http: HttpClient) { }

  search(code: number, id: number) {
    return this.http.get(` http://127.0.0.1:8000/api/succursales/${id}/search/${code}`)
  }
  store(data:any) {
    return this.http.post(`http://127.0.0.1:8000/api/commande`,+data)
  }
}
