//
//  CreateBookViewModel.swift
//  woms
//
//  Created by Guillaume FINE on 21/11/2023.
//

import Foundation

class CreateBookViewModel: ObservableObject {
    @Published var title = ""
    @Published var author = ""
    @Published var readDate = Date()
    @Published var cover = ""
    
    init() {}
    
    func createNewBook() -> Book {
        let book = Book(title: self.title, author: self.author, readDate: self.readDate, cover: self.cover)
        return book
    }
}

