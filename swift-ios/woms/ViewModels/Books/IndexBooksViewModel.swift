//
//  IndexBookListViewModel.swift
//  woms
//
//  Created by Guillaume FINE on 21/11/2023.
//

import Foundation

class IndexBooksViewModel: ObservableObject {
    @Published var createBookIsShowed: Bool = false
    @Published var books: [Book]
    
    init() {
        self.books = []
    }
    
    func removeBook(_ book: Book) {
        if let index = self.books.firstIndex(where: { $0.uuid == book.uuid }) {
            self.books.remove(at: index)
        }
    }
}
