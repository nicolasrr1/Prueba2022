import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { FormsModule } from '@angular/forms';
import { map } from 'rxjs/operators';
import {Caracteristica} from '../model/caracteristicas';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css'],
})
export class HomeComponent implements OnInit {
  allCaracteristicas: Caracteristica[] = [];


  ngOnInit(): void {
    this.fetchCaracteristicas();
  }

  onCaracteristicasFecth() {
    this.fetchCaracteristicas();
  }

  constructor(private http: HttpClient) {}

  onCaracteristicas(caracteristicas: {
    id: string;
    name: string;
    board: string;
    case: string;
    procesador: string;
    grafica: string;
    ram: string;
    disco: string;
    teclado: string;
    mouse: string;
    pantalla: string;
    estado: string;
  }) {
    console.log(caracteristicas);
    this.http
      .post<{name:string}>('http://127.0.0.1:8000/api/GceCaracteristicas', caracteristicas)
      .subscribe((res) => {
        console.log(res);
      });
  }

   public fetchCaracteristicas() {
    this.http
      .get<{[key:string]: Caracteristica}>('http://127.0.0.1:8000/api/GceCaracteristicas')
      .pipe(
        map((res) => {
          const caracteristicas = [];

          for (const key in res) {
            if (res.hasOwnProperty(key)) {
              caracteristicas.push({ ...res[key], gce_id: key });
            }
          }
          return caracteristicas;
        })
      )
      .subscribe((caracteristicas) => {
        console.log(caracteristicas);
        this.allCaracteristicas = caracteristicas;
      });
  }


  cabiarEstado(gce_id){
    this.http
    .get('http://127.0.0.1:8000/api/cambiarEstado/'+gce_id)
      .pipe(
        map((res) => {
          const caracteristicas = [];

          for (const key in res) {
            if (res.hasOwnProperty(key)) {
              caracteristicas.push({ ...res[key], gce_id: key });
            }
          }
          return caracteristicas;
        })
      )
      .subscribe((caracteristicas) => {
        console.log(caracteristicas);
        this.allCaracteristicas = caracteristicas;
      });
  }
  
}
