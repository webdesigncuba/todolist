import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { TodoService } from '../todo.service';


@Component({
  selector: 'app-task-detail',
  templateUrl: './task-detail.component.html',
  styleUrls: ['./task-detail.component.css']
})
export class TaskDetailComponent implements OnInit {
  taskId: number;
  task: any;
  newSubtask = {
    title: '',
    description: ''
  };

  constructor(
    private route: ActivatedRoute,
    private todoService: TodoService
  ) { }

  ngOnInit(): void {
    this.taskId = +this.route.snapshot.paramMap.get('id');
    this.getTask();
  }

  getTask() {
    this.todoService.getTask(this.taskId).subscribe(
      (response: any) => {
        this.task = response.task;
      },
      (error) => {
        console.error(error);
      }
    );
  }

  addSubtask() {
    if (this.newSubtask.title.trim() !== '') {
      this.todoService.addSubtaskToTask(this.taskId, this.newSubtask).subscribe(
        (response: any) => {
          console.log('Subtarea agregada:', response.subtask);
          this.getTask(); // Actualizar la tarea después de agregar la subtarea
          this.newSubtask = { title: '', description: '' }; // Reiniciar el formulario
        },
        (error) => {
          console.error('Error al agregar subtarea:', error);
        }
      );
    }
  }

  removeSubtask(subtaskId: number) {
    this.todoService.deleteSubtask(this.taskId, subtaskId).subscribe(
      () => {
        console.log('Subtarea eliminada');
        this.getTask(); // Actualizar la tarea después de eliminar la subtarea
      },
      (error) => {
        console.error('Error al eliminar subtarea:', error);
      }
    );
  }
  
}
