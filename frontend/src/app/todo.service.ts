import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class TodoService {
  private apiUrl = 'http://localhost:8000/api'; // Reemplaza con la URL de tu API Laravel

  constructor(private http: HttpClient) { }

  getTasks(): Observable<any> {
    return this.http.get(`${this.apiUrl}/tasks`);
  }

  getTask(taskId: number): Observable<any> {
    return this.http.get(`${this.apiUrl}/tasks/${taskId}`);
  }

  createTask(taskData: any): Observable<any> {
    return this.http.post(`${this.apiUrl}/tasks`, taskData);
  }

  updateTask(taskId: number, taskData: any): Observable<any> {
    return this.http.put(`${this.apiUrl}/tasks/${taskId}`, taskData);
  }

  deleteTask(taskId: number): Observable<any> {
    return this.http.delete(`${this.apiUrl}/tasks/${taskId}`);
  }

  addSubtaskToTask(taskId: number, newSubtask: any): Observable<any> {
    const url = `${this.apiUrl}/tasks/${taskId}/subtasks`; // Ruta de la API para agregar subtareas a una tarea específica
    return this.http.post<any>(url, newSubtask);
  }

  deleteSubtask(taskId: number, subtaskId: number): Observable<any> {
    const url = `${this.apiUrl}/tasks/${taskId}/subtasks/${subtaskId}`;
    return this.http.delete<any>(url);
  }
  
}

