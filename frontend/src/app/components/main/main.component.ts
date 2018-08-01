import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Component({
  selector: 'app-main',
  templateUrl: './main.component.html',
  styleUrls: ['./main.component.css']
})
export class MainComponent implements OnInit {

  constructor(private http: HttpClient) { }
  Menus: string [];

  ngOnInit() {
    this.http.get('http://danangfreewalkingtour.com/api/getMenu').subscribe(data =>{
      this.Menus = data as string [];
      console.log(data);
    });
  }
}
