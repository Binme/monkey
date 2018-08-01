import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Router } from '@angular/router';
import { FormGroup, FormControl, FormArray, NgForm } from '@angular/forms';

@Component({
  selector: 'app-profile',
  templateUrl: './profile.component.html',
  styleUrls: ['./profile.component.css']
})
export class ProfileComponent implements OnInit {

  // private productForm: FormGroup;
  //   product: any;
  //   products: any;

  public form = {
    id: null,
    title: null,
    href: null,
  };  
  constructor(
    private http: HttpClient,
    private router: Router
  ) {
    // this.getProducts();
   }
  Menus: string [];

  // // Add a New Product
  // storeProduct(productForm: NgForm) {
  //   // console.log('Form successful submit.');
  //   // console.log(productForm.value);

  //   this.http.post('http://laravel-api.testing/api/product', productForm.value).subscribe(res => {
  //       this.getProducts();
  //       productForm.reset();
  //   }, err => {
  //       console.log('Error occured');
  //   });
  // }
  
  ngOnInit() {
    this.http.get('http://localhost:8000/api/getMenu').subscribe(data =>{
      this.Menus = data as string [];
      // console.log(data);
    });
    // this.productForm = new FormGroup({
    //   'id': new FormControl(),
    //   'title': new FormControl(),
    //   'href': new FormControl()
    // });
  }

  // getProducts() {
  //   // console.log('Get Products and Update Table');
  //   return this.http.get('http://localhost:8000/api/getMenu').subscribe(products => { 
  //     this.products = products;
  //   });
  // }

  // showProduct(id) {
  //   console.log('Get Product ' + id);
  //   return this.http.get('http://localhost:8000/api/getMenuById' + id).subscribe(product => {
  //       this.product = product;
  //       console.log(product);
  //       this.productForm.patchValue({ 
  //           id: this.product.id,
  //           title: this.product.title,
  //           href: this.product.href
  //       });
  //   });
  // }

  // deleteProduct(id) {
  //   console.log('Delete Product id ' + id);

  //   this.http.delete('http://laravel-api.testing/api/product/' + id).subscribe(res => {
  //       console.log('Product Deleted and refresh Table');
  //       this.getProducts();
  //   }, err => {
  //       console.log('Error occured');
  //   });
  // }

  // putProduct(id) {
  //   console.log('Update Product id ' + id);

  //   this.http.put('http://laravel-api.testing/api/product/' + id, this.productForm.value).subscribe(res => {
  //       console.log('Product Updated and refresh table');
  //       this.getProducts();
  //   }, err => {
  //       console.log('Error occured');
  //   });
  // }

  onSubmit() {
    this.http.post('http://localhost:8000/api/createMenu',this.form).subscribe(data =>{
      // console.log(data);
      // this.router.navigateByUrl('/profile');
      this.ngOnInit();
    });
  }
  createDetailMenu(){
    // console.log(this.form);
    this.http.post('http://localhost:8000/api/createMenuDetail/' +this.form.id,this.form).subscribe(data =>{
      console.log(data);
      // this.router.navigateByUrl('/profile');
      this.ngOnInit();
    });
  }
  editMenu(){
    this.http.post('http://localhost:8000/api/editMenu/' +this.form.id,this.form).subscribe(data =>{
      console.log(data);
      // this.router.navigateByUrl('/profile');
      this.ngOnInit();
    });
  }
  editDetailMenu(){
    this.http.post('http://localhost:8000/api/editDetailMenu/' +this.form.id,this.form).subscribe(data =>{
      console.log(data);
      // this.router.navigateByUrl('/profile');
      this.ngOnInit();
    });
  }
  deleteMenu(id){
    this.http.get('http://localhost:8000/api/deleteMenu/' +id).subscribe(data =>{
      console.log(data);
      // this.router.navigateByUrl('/profile');
      this.ngOnInit();
    });
  }
  deleteDetailMenu(id){
    this.http.get('http://localhost:8000/api/deleteDetailMenu/' +id).subscribe(data =>{
      console.log(data);
      // this.router.navigateByUrl('/profile');
      this.ngOnInit();
    });
  }
}

