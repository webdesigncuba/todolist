import { Component, OnInit } from '@angular/core';
import { TodoService } from '../todo.service';


@Component({
  selector: 'app-new-task',
  templateUrl: './new-task.component.html',
  styleUrls: ['./new-task.component.css']
})
export class NewTaskComponent implements OnInit  {
  newTask = {
    title: '',
    description: ''
  };

  constructor(private todoService: TodoService) { }

  ngOnInit(): void {
   
  }


  addTask() {
    if (this.newTask.title.trim() !== '') {
      this.todoService.createTask(this.newTask).subscribe(
        (response: any) => {
          // La tarea ha sido creada exitosamente
          console.log('Tarea creada:', response.task);
          // Aquí podrías agregar lógica adicional, como actualizar la lista de tareas, mostrar un mensaje, etc.
          // Por ejemplo, puedes redirigir a la lista de tareas después de crear una nueva tarea:
          // this.router.navigate(['/tasks']);
        },
        (error) => {
          console.error('Error al crear la tarea:', error);
        }
      );
    }
  }
}

